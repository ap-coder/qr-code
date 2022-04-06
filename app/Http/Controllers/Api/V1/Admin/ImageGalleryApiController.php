<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreImageGalleryRequest;
use App\Http\Requests\UpdateImageGalleryRequest;
use App\Http\Resources\Admin\ImageGalleryResource;
use App\Models\ImageGallery;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ImageGalleryApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('image_gallery_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ImageGalleryResource(ImageGallery::with(['created_by'])->get());
    }

    public function store(StoreImageGalleryRequest $request)
    {
        $imageGallery = ImageGallery::create($request->all());

        foreach ($request->input('images', []) as $file) {
            $imageGallery->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('images');
        }

        if ($request->input('loading_image', false)) {
            $imageGallery->addMedia(storage_path('tmp/uploads/' . basename($request->input('loading_image'))))->toMediaCollection('loading_image');
        }

        return (new ImageGalleryResource($imageGallery))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ImageGallery $imageGallery)
    {
        abort_if(Gate::denies('image_gallery_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ImageGalleryResource($imageGallery->load(['created_by']));
    }

    public function update(UpdateImageGalleryRequest $request, ImageGallery $imageGallery)
    {
        $imageGallery->update($request->all());

        if (count($imageGallery->images) > 0) {
            foreach ($imageGallery->images as $media) {
                if (!in_array($media->file_name, $request->input('images', []))) {
                    $media->delete();
                }
            }
        }
        $media = $imageGallery->images->pluck('file_name')->toArray();
        foreach ($request->input('images', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $imageGallery->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('images');
            }
        }

        if ($request->input('loading_image', false)) {
            if (!$imageGallery->loading_image || $request->input('loading_image') !== $imageGallery->loading_image->file_name) {
                if ($imageGallery->loading_image) {
                    $imageGallery->loading_image->delete();
                }
                $imageGallery->addMedia(storage_path('tmp/uploads/' . basename($request->input('loading_image'))))->toMediaCollection('loading_image');
            }
        } elseif ($imageGallery->loading_image) {
            $imageGallery->loading_image->delete();
        }

        return (new ImageGalleryResource($imageGallery))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ImageGallery $imageGallery)
    {
        abort_if(Gate::denies('image_gallery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $imageGallery->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
