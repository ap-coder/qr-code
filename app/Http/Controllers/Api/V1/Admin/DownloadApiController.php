<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreDownloadRequest;
use App\Http\Requests\UpdateDownloadRequest;
use App\Http\Resources\Admin\DownloadResource;
use App\Models\Download;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DownloadApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('download_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DownloadResource(Download::with(['qr_color', 'created_by'])->get());
    }

    public function store(StoreDownloadRequest $request)
    {
        $download = Download::create($request->all());

        if ($request->input('logo', false)) {
            $download->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        return (new DownloadResource($download))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Download $download)
    {
        abort_if(Gate::denies('download_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DownloadResource($download->load(['qr_color', 'created_by']));
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

        return (new DownloadResource($download))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Download $download)
    {
        abort_if(Gate::denies('download_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $download->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
