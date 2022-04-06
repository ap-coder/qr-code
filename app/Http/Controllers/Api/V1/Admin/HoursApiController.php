<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHourRequest;
use App\Http\Requests\UpdateHourRequest;
use App\Http\Resources\Admin\HourResource;
use App\Models\Hour;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HoursApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('hour_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HourResource(Hour::all());
    }

    public function store(StoreHourRequest $request)
    {
        $hour = Hour::create($request->all());

        return (new HourResource($hour))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Hour $hour)
    {
        abort_if(Gate::denies('hour_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HourResource($hour);
    }

    public function update(UpdateHourRequest $request, Hour $hour)
    {
        $hour->update($request->all());

        return (new HourResource($hour))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Hour $hour)
    {
        abort_if(Gate::denies('hour_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hour->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
