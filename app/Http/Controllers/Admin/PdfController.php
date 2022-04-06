<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPdfRequest;
use App\Http\Requests\StorePdfRequest;
use App\Http\Requests\UpdatePdfRequest;
use App\Models\Pdf;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PdfController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('pdf_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Pdf::with(['created_by'])->select(sprintf('%s.*', (new Pdf())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'pdf_show';
                $editGate = 'pdf_edit';
                $deleteGate = 'pdf_delete';
                $crudRoutePart = 'pdfs';

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
            $table->editColumn('active', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->active ? 'checked' : null) . '>';
            });
            $table->editColumn('qr_name', function ($row) {
                return $row->qr_name ? $row->qr_name : '';
            });
            $table->editColumn('company', function ($row) {
                return $row->company ? $row->company : '';
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->addColumn('created_by_name', function ($row) {
                return $row->created_by ? $row->created_by->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'active', 'created_by']);

            return $table->make(true);
        }

        return view('admin.pdfs.index');
    }

    public function create()
    {
        abort_if(Gate::denies('pdf_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.pdfs.create', compact('created_bies'));
    }

    public function store(StorePdfRequest $request)
    {
        $pdf = Pdf::create($request->all());

        if ($request->input('pdf', false)) {
            $pdf->addMedia(storage_path('tmp/uploads/' . basename($request->input('pdf'))))->toMediaCollection('pdf');
        }

        if ($request->input('loading_image', false)) {
            $pdf->addMedia(storage_path('tmp/uploads/' . basename($request->input('loading_image'))))->toMediaCollection('loading_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $pdf->id]);
        }

        return redirect()->route('admin.pdfs.index');
    }

    public function edit(Pdf $pdf)
    {
        abort_if(Gate::denies('pdf_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pdf->load('created_by');

        return view('admin.pdfs.edit', compact('created_bies', 'pdf'));
    }

    public function update(UpdatePdfRequest $request, Pdf $pdf)
    {
        $pdf->update($request->all());

        if ($request->input('pdf', false)) {
            if (!$pdf->pdf || $request->input('pdf') !== $pdf->pdf->file_name) {
                if ($pdf->pdf) {
                    $pdf->pdf->delete();
                }
                $pdf->addMedia(storage_path('tmp/uploads/' . basename($request->input('pdf'))))->toMediaCollection('pdf');
            }
        } elseif ($pdf->pdf) {
            $pdf->pdf->delete();
        }

        if ($request->input('loading_image', false)) {
            if (!$pdf->loading_image || $request->input('loading_image') !== $pdf->loading_image->file_name) {
                if ($pdf->loading_image) {
                    $pdf->loading_image->delete();
                }
                $pdf->addMedia(storage_path('tmp/uploads/' . basename($request->input('loading_image'))))->toMediaCollection('loading_image');
            }
        } elseif ($pdf->loading_image) {
            $pdf->loading_image->delete();
        }

        return redirect()->route('admin.pdfs.index');
    }

    public function show(Pdf $pdf)
    {
        abort_if(Gate::denies('pdf_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pdf->load('created_by');

        return view('admin.pdfs.show', compact('pdf'));
    }

    public function destroy(Pdf $pdf)
    {
        abort_if(Gate::denies('pdf_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pdf->delete();

        return back();
    }

    public function massDestroy(MassDestroyPdfRequest $request)
    {
        Pdf::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('pdf_create') && Gate::denies('pdf_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Pdf();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
