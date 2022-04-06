<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDownloadRequest;
use App\Http\Requests\StoreDownloadRequest;
use App\Http\Requests\UpdateDownloadRequest;
use App\Models\Download;
use App\Models\QrColor;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DownloadController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('download_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Download::with(['qr_color', 'created_by'])->select(sprintf('%s.*', (new Download())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'download_show';
                $editGate = 'download_edit';
                $deleteGate = 'download_delete';
                $crudRoutePart = 'downloads';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('frame', function ($row) {
                return $row->frame ? Download::FRAME_SELECT[$row->frame] : '';
            });
            $table->editColumn('frame_color', function ($row) {
                return $row->frame_color ? $row->frame_color : '';
            });
            $table->editColumn('frame_text', function ($row) {
                return $row->frame_text ? $row->frame_text : '';
            });
            $table->editColumn('logo', function ($row) {
                if ($photo = $row->logo) {
                    return sprintf(
        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
        $photo->url,
        $photo->thumbnail
    );
                }

                return '';
            });
            $table->editColumn('code', function ($row) {
                return $row->code ? Download::CODE_SELECT[$row->code] : '';
            });
            $table->addColumn('qr_color_color', function ($row) {
                return $row->qr_color ? $row->qr_color->color : '';
            });

            $table->editColumn('qr_color.corner_inner', function ($row) {
                return $row->qr_color ? (is_string($row->qr_color) ? $row->qr_color : $row->qr_color->corner_inner) : '';
            });
            $table->editColumn('qr_color.corner_outer', function ($row) {
                return $row->qr_color ? (is_string($row->qr_color) ? $row->qr_color : $row->qr_color->corner_outer) : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'logo', 'qr_color']);

            return $table->make(true);
        }

        return view('admin.downloads.index');
    }

    public function create()
    {
        abort_if(Gate::denies('download_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $qr_colors = QrColor::pluck('color', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.downloads.create', compact('qr_colors'));
    }

    public function store(StoreDownloadRequest $request)
    {
        $download = Download::create($request->all());

        if ($request->input('logo', false)) {
            $download->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $download->id]);
        }

        return redirect()->route('admin.downloads.index');
    }

    public function edit(Download $download)
    {
        abort_if(Gate::denies('download_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $qr_colors = QrColor::pluck('color', 'id')->prepend(trans('global.pleaseSelect'), '');

        $download->load('qr_color', 'created_by');

        return view('admin.downloads.edit', compact('download', 'qr_colors'));
    }

    public function update(UpdateDownloadRequest $request, Download $download)
    {
        $download->update($request->all());

        if ($request->input('logo', false)) {
            if (!$download->logo || $request->input('logo') !== $download->logo->file_name) {
                if ($download->logo) {
                    $download->logo->delete();
                }
                $download->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($download->logo) {
            $download->logo->delete();
        }

        return redirect()->route('admin.downloads.index');
    }

    public function show(Download $download)
    {
        abort_if(Gate::denies('download_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $download->load('qr_color', 'created_by');

        return view('admin.downloads.show', compact('download'));
    }

    public function destroy(Download $download)
    {
        abort_if(Gate::denies('download_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $download->delete();

        return back();
    }

    public function massDestroy(MassDestroyDownloadRequest $request)
    {
        Download::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('download_create') && Gate::denies('download_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Download();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
