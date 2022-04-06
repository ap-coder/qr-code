<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreSocialChannelRequest;
use App\Http\Requests\UpdateSocialChannelRequest;
use App\Http\Resources\Admin\SocialChannelResource;
use App\Models\SocialChannel;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SocialChannelApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('social_channel_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SocialChannelResource(SocialChannel::with(['socials', 'created_by'])->get());
    }

    public function store(StoreSocialChannelRequest $request)
    {
        $socialChannel = SocialChannel::create($request->all());
        $socialChannel->socials()->sync($request->input('socials', []));
        if ($request->input('header_image', false)) {
            $socialChannel->addMedia(storage_path('tmp/uploads/' . basename($request->input('header_image'))))->toMediaCollection('header_image');
        }

        if ($request->input('loading_image', false)) {
            $socialChannel->addMedia(storage_path('tmp/uploads/' . basename($request->input('loading_image'))))->toMediaCollection('loading_image');
        }

        return (new SocialChannelResource($socialChannel))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(SocialChannel $socialChannel)
    {
        abort_if(Gate::denies('social_channel_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SocialChannelResource($socialChannel->load(['socials', 'created_by']));
    }

    public function update(UpdateSocialChannelRequest $request, SocialChannel $socialChannel)
    {
        $socialChannel->update($request->all());
        $socialChannel->socials()->sync($request->input('socials', []));
        if ($request->input('header_image', false)) {
            if (!$socialChannel->header_image || $request->input('header_image') !== $socialChannel->header_image->file_name) {
                if ($socialChannel->header_image) {
                    $socialChannel->header_image->delete();
                }
                $socialChannel->addMedia(storage_path('tmp/uploads/' . basename($request->input('header_image'))))->toMediaCollection('header_image');
            }
        } elseif ($socialChannel->header_image) {
            $socialChannel->header_image->delete();
        }

        if ($request->input('loading_image', false)) {
            if (!$socialChannel->loading_image || $request->input('loading_image') !== $socialChannel->loading_image->file_name) {
                if ($socialChannel->loading_image) {
                    $socialChannel->loading_image->delete();
                }
                $socialChannel->addMedia(storage_path('tmp/uploads/' . basename($request->input('loading_image'))))->toMediaCollection('loading_image');
            }
        } elseif ($socialChannel->loading_image) {
            $socialChannel->loading_image->delete();
        }

        return (new SocialChannelResource($socialChannel))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(SocialChannel $socialChannel)
    {
        abort_if(Gate::denies('social_channel_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $socialChannel->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
