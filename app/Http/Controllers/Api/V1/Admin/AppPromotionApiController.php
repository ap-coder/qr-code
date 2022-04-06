<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreAppPromotionRequest;
use App\Http\Requests\UpdateAppPromotionRequest;
use App\Http\Resources\Admin\AppPromotionResource;
use App\Models\AppPromotion;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AppPromotionApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('app_promotion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AppPromotionResource(AppPromotion::with(['colors', 'created_by'])->get());
    }

    public function store(StoreAppPromotionRequest $request)
    {
        $appPromotion = AppPromotion::create($request->all());

        if ($request->input('app_logo', false)) {
            $appPromotion->addMedia(storage_path('tmp/uploads/' . basename($request->input('app_logo'))))->toMediaCollection('app_logo');
        }

        if ($request->input('loading_image', false)) {
            $appPromotion->addMedia(storage_path('tmp/uploads/' . basename($request->input('loading_image'))))->toMediaCollection('loading_image');
        }

        return (new AppPromotionResource($appPromotion))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(AppPromotion $appPromotion)
    {
        abort_if(Gate::denies('app_promotion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AppPromotionResource($appPromotion->load(['colors', 'created_by']));
    }

    public function update(UpdateAppPromotionRequest $request, AppPromotion $appPromotion)
    {
        $appPromotion->update($request->all());

        if ($request->input('app_logo', false)) {
            if (!$appPromotion->app_logo || $request->input('app_logo') !== $appPromotion->app_logo->file_name) {
                if ($appPromotion->app_logo) {
                    $appPromotion->app_logo->delete();
                }
                $appPromotion->addMedia(storage_path('tmp/uploads/' . basename($request->input('app_logo'))))->toMediaCollection('app_logo');
            }
        } elseif ($appPromotion->app_logo) {
            $appPromotion->app_logo->delete();
        }

        if ($request->input('loading_image', false)) {
            if (!$appPromotion->loading_image || $request->input('loading_image') !== $appPromotion->loading_image->file_name) {
                if ($appPromotion->loading_image) {
                    $appPromotion->loading_image->delete();
                }
                $appPromotion->addMedia(storage_path('tmp/uploads/' . basename($request->input('loading_image'))))->toMediaCollection('loading_image');
            }
        } elseif ($appPromotion->loading_image) {
            $appPromotion->loading_image->delete();
        }

        return (new AppPromotionResource($appPromotion))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(AppPromotion $appPromotion)
    {
        abort_if(Gate::denies('app_promotion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appPromotion->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
