<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StorePdfRequest;
use App\Http\Requests\UpdatePdfRequest;
use App\Http\Resources\Admin\PdfResource;
use App\Models\Pdf;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PdfApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('pdf_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PdfResource(Pdf::with(['created_by'])->get());
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

        return (new PdfResource($pdf))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Pdf $pdf)
    {
        abort_if(Gate::denies('pdf_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PdfResource($pdf->load(['created_by']));
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

        return (new PdfResource($pdf))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Pdf $pdf)
    {
        abort_if(Gate::denies('pdf_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pdf->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
