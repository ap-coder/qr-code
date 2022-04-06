<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQrIndustryRequest;
use App\Http\Requests\UpdateQrIndustryRequest;
use App\Http\Resources\Admin\QrIndustryResource;
use App\Models\QrIndustry;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QrIndustryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('qr_industry_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new QrIndustryResource(QrIndustry::all());
    }

    public function store(StoreQrIndustryRequest $request)
    {
        $qrIndustry = QrIndustry::create($request->all());

        return (new QrIndustryResource($qrIndustry))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(QrIndustry $qrIndustry)
    {
        abort_if(Gate::denies('qr_industry_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new QrIndustryResource($qrIndustry);
    }

    public function update(UpdateQrIndustryRequest $request, QrIndustry $qrIndustry)
    {
        $qrIndustry->update($request->all());

        return (new QrIndustryResource($qrIndustry))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(QrIndustry $qrIndustry)
    {
        abort_if(Gate::denies('qr_industry_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $qrIndustry->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
