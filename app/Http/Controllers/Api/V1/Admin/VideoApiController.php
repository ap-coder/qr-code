<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Http\Resources\Admin\VideoResource;
use App\Models\Video;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VideoApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('video_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VideoResource(Video::with(['created_by', 'design_colors', 'social_channels'])->get());
    }

    public function store(StoreVideoRequest $request)
    {
        $video = Video::create($request->all());
        $video->social_channels()->sync($request->input('social_channels', []));
        if ($request->input('loading_image', false)) {
            $video->addMedia(storage_path('tmp/uploads/' . basename($request->input('loading_image'))))->toMediaCollection('loading_image');
        }

        return (new VideoResource($video))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Video $video)
    {
        abort_if(Gate::denies('video_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VideoResource($video->load(['created_by', 'design_colors', 'social_channels']));
    }

    public function update(UpdateVideoRequest $request, Video $video)
    {
        $video->update($request->all());
        $video->social_channels()->sync($request->input('social_channels', []));
        if ($request->input('loading_image', false)) {
            if (!$video->loading_image || $request->input('loading_image') !== $video->loading_image->file_name) {
                if ($video->loading_image) {
                    $video->loading_image->delete();
                }
                $video->addMedia(storage_path('tmp/uploads/' . basename($request->input('loading_image'))))->toMediaCollection('loading_image');
            }
        } elseif ($video->loading_image) {
            $video->loading_image->delete();
        }

        return (new VideoResource($video))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Video $video)
    {
        abort_if(Gate::denies('video_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $video->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
