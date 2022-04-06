<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreBusinessPageRequest;
use App\Http\Requests\UpdateBusinessPageRequest;
use App\Http\Resources\Admin\BusinessPageResource;
use App\Models\BusinessPage;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BusinessPageApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('business_page_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BusinessPageResource(BusinessPage::with(['hours', 'created_by'])->get());
    }

    public function store(StoreBusinessPageRequest $request)
    {
        $businessPage = BusinessPage::create($request->all());
        $businessPage->hours()->sync($request->input('hours', []));
        if ($request->input('header_image', false)) {
            $businessPage->addMedia(storage_path('tmp/uploads/' . basename($request->input('header_image'))))->toMediaCollection('header_image');
        }

        if ($request->input('loading_image', false)) {
            $businessPage->addMedia(storage_path('tmp/uploads/' . basename($request->input('loading_image'))))->toMediaCollection('loading_image');
        }

        return (new BusinessPageResource($businessPage))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(BusinessPage $businessPage)
    {
        abort_if(Gate::denies('business_page_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BusinessPageResource($businessPage->load(['hours', 'created_by']));
    }

    public function update(UpdateBusinessPageRequest $request, BusinessPage $businessPage)
    {
        $businessPage->update($request->all());
        $businessPage->hours()->sync($request->input('hours', []));
        if ($request->input('header_image', false)) {
            if (!$businessPage->header_image || $request->input('header_image') !== $businessPage->header_image->file_name) {
                if ($businessPage->header_image) {
                    $businessPage->header_image->delete();
                }
                $businessPage->addMedia(storage_path('tmp/uploads/' . basename($request->input('header_image'))))->toMediaCollection('header_image');
            }
        } elseif ($businessPage->header_image) {
            $businessPage->header_image->delete();
        }

        if ($request->input('loading_image', false)) {
            if (!$businessPage->loading_image || $request->input('loading_image') !== $businessPage->loading_image->file_name) {
                if ($businessPage->loading_image) {
                    $businessPage->loading_image->delete();
                }
                $businessPage->addMedia(storage_path('tmp/uploads/' . basename($request->input('loading_image'))))->toMediaCollection('loading_image');
            }
        } elseif ($businessPage->loading_image) {
            $businessPage->loading_image->delete();
        }

        return (new BusinessPageResource($businessPage))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(BusinessPage $businessPage)
    {
        abort_if(Gate::denies('business_page_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $businessPage->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
