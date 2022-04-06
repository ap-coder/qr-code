<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWebsiteRequest;
use App\Http\Requests\UpdateWebsiteRequest;
use App\Http\Resources\Admin\WebsiteResource;
use App\Models\Website;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WebsiteApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('website_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new WebsiteResource(Website::with(['created_by'])->get());
    }

    public function store(StoreWebsiteRequest $request)
    {
        $website = Website::create($request->all());

        return (new WebsiteResource($website))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Website $website)
    {
        abort_if(Gate::denies('website_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new WebsiteResource($website->load(['created_by']));
    }

    public function update(UpdateWebsiteRequest $request, Website $website)
    {
        $website->update($request->all());

        return (new WebsiteResource($website))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Website $website)
    {
        abort_if(Gate::denies('website_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $website->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
