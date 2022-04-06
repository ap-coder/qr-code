<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDesignColorRequest;
use App\Http\Requests\UpdateDesignColorRequest;
use App\Http\Resources\Admin\DesignColorResource;
use App\Models\DesignColor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DesignColorApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('design_color_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DesignColorResource(DesignColor::all());
    }

    public function store(StoreDesignColorRequest $request)
    {
        $designColor = DesignColor::create($request->all());

        return (new DesignColorResource($designColor))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(DesignColor $designColor)
    {
        abort_if(Gate::denies('design_color_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DesignColorResource($designColor);
    }

    public function update(UpdateDesignColorRequest $request, DesignColor $designColor)
    {
        $designColor->update($request->all());

        return (new DesignColorResource($designColor))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(DesignColor $designColor)
    {
        abort_if(Gate::denies('design_color_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $designColor->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
