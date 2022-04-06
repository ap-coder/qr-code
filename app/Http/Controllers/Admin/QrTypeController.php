<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyQrTypeRequest;
use App\Http\Requests\StoreQrTypeRequest;
use App\Http\Requests\UpdateQrTypeRequest;
use App\Models\QrIndustry;
use App\Models\QrType;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class QrTypeController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('qr_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = QrType::with(['industries'])->select(sprintf('%s.*', (new QrType())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'qr_type_show';
                $editGate = 'qr_type_edit';
                $deleteGate = 'qr_type_delete';
                $crudRoutePart = 'qr-types';

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
            $table->editColumn('published', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->published ? 'checked' : null) . '>';
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('subtitle', function ($row) {
                return $row->subtitle ? $row->subtitle : '';
            });
            $table->editColumn('select_type', function ($row) {
                return $row->select_type ? QrType::SELECT_TYPE_SELECT[$row->select_type] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'published']);

            return $table->make(true);
        }

        return view('admin.qrTypes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('qr_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $industries = QrIndustry::pluck('name', 'id');

        return view('admin.qrTypes.create', compact('industries'));
    }

    public function store(StoreQrTypeRequest $request)
    {
        $qrType = QrType::create($request->all());
        $qrType->industries()->sync($request->input('industries', []));
        if ($request->input('mock_image', false)) {
            $qrType->addMedia(storage_path('tmp/uploads/' . basename($request->input('mock_image'))))->toMediaCollection('mock_image');
        }

        if ($request->input('hover_over_image', false)) {
            $qrType->addMedia(storage_path('tmp/uploads/' . basename($request->input('hover_over_image'))))->toMediaCollection('hover_over_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $qrType->id]);
        }

        return redirect()->route('admin.qr-types.index');
    }

    public function edit(QrType $qrType)
    {
        abort_if(Gate::denies('qr_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $industries = QrIndustry::pluck('name', 'id');

        $qrType->load('industries');

        return view('admin.qrTypes.edit', compact('industries', 'qrType'));
    }

    public function update(UpdateQrTypeRequest $request, QrType $qrType)
    {
        $qrType->update($request->all());
        $qrType->industries()->sync($request->input('industries', []));
        if ($request->input('mock_image', false)) {
            if (!$qrType->mock_image || $request->input('mock_image') !== $qrType->mock_image->file_name) {
                if ($qrType->mock_image) {
                    $qrType->mock_image->delete();
                }
                $qrType->addMedia(storage_path('tmp/uploads/' . basename($request->input('mock_image'))))->toMediaCollection('mock_image');
            }
        } elseif ($qrType->mock_image) {
            $qrType->mock_image->delete();
        }

        if ($request->input('hover_over_image', false)) {
            if (!$qrType->hover_over_image || $request->input('hover_over_image') !== $qrType->hover_over_image->file_name) {
                if ($qrType->hover_over_image) {
                    $qrType->hover_over_image->delete();
                }
                $qrType->addMedia(storage_path('tmp/uploads/' . basename($request->input('hover_over_image'))))->toMediaCollection('hover_over_image');
            }
        } elseif ($qrType->hover_over_image) {
            $qrType->hover_over_image->delete();
        }

        return redirect()->route('admin.qr-types.index');
    }

    public function show(QrType $qrType)
    {
        abort_if(Gate::denies('qr_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $qrType->load('industries', 'typesQrCodes');

        return view('admin.qrTypes.show', compact('qrType'));
    }

    public function destroy(QrType $qrType)
    {
        abort_if(Gate::denies('qr_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $qrType->delete();

        return back();
    }

    public function massDestroy(MassDestroyQrTypeRequest $request)
    {
        QrType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('qr_type_create') && Gate::denies('qr_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new QrType();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
