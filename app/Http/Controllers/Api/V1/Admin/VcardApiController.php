<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreVcardRequest;
use App\Http\Requests\UpdateVcardRequest;
use App\Http\Resources\Admin\VcardResource;
use App\Models\Vcard;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VcardApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('vcard_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VcardResource(Vcard::with(['hours', 'address', 'created_by'])->get());
    }

    public function store(StoreVcardRequest $request)
    {
        $vcard = Vcard::create($request->all());
        $vcard->hours()->sync($request->input('hours', []));
        if ($request->input('photo', false)) {
            $vcard->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($request->input('loading_photo', false)) {
            $vcard->addMedia(storage_path('tmp/uploads/' . basename($request->input('loading_photo'))))->toMediaCollection('loading_photo');
        }

        return (new VcardResource($vcard))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Vcard $vcard)
    {
        abort_if(Gate::denies('vcard_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new VcardResource($vcard->load(['hours', 'address', 'created_by']));
    }

    public function update(UpdateVcardRequest $request, Vcard $vcard)
    {
        $vcard->update($request->all());
        $vcard->hours()->sync($request->input('hours', []));
        if ($request->input('photo', false)) {
            if (!$vcard->photo || $request->input('photo') !== $vcard->photo->file_name) {
                if ($vcard->photo) {
                    $vcard->photo->delete();
                }
                $vcard->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($vcard->photo) {
            $vcard->photo->delete();
        }

        if ($request->input('loading_photo', false)) {
            if (!$vcard->loading_photo || $request->input('loading_photo') !== $vcard->loading_photo->file_name) {
                if ($vcard->loading_photo) {
                    $vcard->loading_photo->delete();
                }
                $vcard->addMedia(storage_path('tmp/uploads/' . basename($request->input('loading_photo'))))->toMediaCollection('loading_photo');
            }
        } elseif ($vcard->loading_photo) {
            $vcard->loading_photo->delete();
        }

        return (new VcardResource($vcard))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Vcard $vcard)
    {
        abort_if(Gate::denies('vcard_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vcard->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
