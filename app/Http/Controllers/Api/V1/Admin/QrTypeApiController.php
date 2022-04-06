<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreQrTypeRequest;
use App\Http\Requests\UpdateQrTypeRequest;
use App\Http\Resources\Admin\QrTypeResource;
use App\Models\QrType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QrTypeApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('qr_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new QrTypeResource(QrType::with(['industries'])->get());
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

        return (new QrTypeResource($qrType))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(QrType $qrType)
    {
        abort_if(Gate::denies('qr_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new QrTypeResource($qrType->load(['industries']));
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

        return (new QrTypeResource($qrType))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(QrType $qrType)
    {
        abort_if(Gate::denies('qr_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $qrType->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
