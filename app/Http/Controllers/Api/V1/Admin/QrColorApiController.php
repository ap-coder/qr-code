<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQrColorRequest;
use App\Http\Requests\UpdateQrColorRequest;
use App\Http\Resources\Admin\QrColorResource;
use App\Models\QrColor;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QrColorApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('qr_color_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new QrColorResource(QrColor::all());
    }

    public function store(StoreQrColorRequest $request)
    {
        $qrColor = QrColor::create($request->all());

        return (new QrColorResource($qrColor))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(QrColor $qrColor)
    {
        abort_if(Gate::denies('qr_color_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new QrColorResource($qrColor);
    }

    public function update(UpdateQrColorRequest $request, QrColor $qrColor)
    {
        $qrColor->update($request->all());

        return (new QrColorResource($qrColor))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(QrColor $qrColor)
    {
        abort_if(Gate::denies('qr_color_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $qrColor->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
