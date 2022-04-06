<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSocialRequest;
use App\Http\Requests\UpdateSocialRequest;
use App\Http\Resources\Admin\SocialResource;
use App\Models\Social;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SocialApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('social_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SocialResource(Social::all());
    }

    public function store(StoreSocialRequest $request)
    {
        $social = Social::create($request->all());

        return (new SocialResource($social))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Social $social)
    {
        abort_if(Gate::denies('social_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SocialResource($social);
    }

    public function update(UpdateSocialRequest $request, Social $social)
    {
        $social->update($request->all());

        return (new SocialResource($social))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Social $social)
    {
        abort_if(Gate::denies('social_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $social->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
