<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyVcardRequest;
use App\Http\Requests\StoreVcardRequest;
use App\Http\Requests\UpdateVcardRequest;
use App\Models\Address;
use App\Models\Hour;
use App\Models\User;
use App\Models\Vcard;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class VcardController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('vcard_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Vcard::with(['hours', 'address', 'created_by'])->select(sprintf('%s.*', (new Vcard())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'vcard_show';
                $editGate = 'vcard_edit';
                $deleteGate = 'vcard_delete';
                $crudRoutePart = 'vcards';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('active', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->active ? 'checked' : null) . '>';
            });
            $table->editColumn('qr_name', function ($row) {
                return $row->qr_name ? $row->qr_name : '';
            });
            $table->editColumn('first_name', function ($row) {
                return $row->first_name ? $row->first_name : '';
            });
            $table->editColumn('last_name', function ($row) {
                return $row->last_name ? $row->last_name : '';
            });
            $table->addColumn('created_by_name', function ($row) {
                return $row->created_by ? $row->created_by->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'active', 'created_by']);

            return $table->make(true);
        }

        return view('admin.vcards.index');
    }

    public function create()
    {
        abort_if(Gate::denies('vcard_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hours = Hour::pluck('day', 'id');

        $addresses = Address::pluck('nickname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.vcards.create', compact('addresses', 'created_bies', 'hours'));
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

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $vcard->id]);
        }

        return redirect()->route('admin.vcards.index');
    }

    public function edit(Vcard $vcard)
    {
        abort_if(Gate::denies('vcard_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hours = Hour::pluck('day', 'id');

        $addresses = Address::pluck('nickname', 'id')->prepend(trans('global.pleaseSelect'), '');

        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vcard->load('hours', 'address', 'created_by');

        return view('admin.vcards.edit', compact('addresses', 'created_bies', 'hours', 'vcard'));
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

        return redirect()->route('admin.vcards.index');
    }

    public function show(Vcard $vcard)
    {
        abort_if(Gate::denies('vcard_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vcard->load('hours', 'address', 'created_by', 'vcardsQrCodes');

        return view('admin.vcards.show', compact('vcard'));
    }

    public function destroy(Vcard $vcard)
    {
        abort_if(Gate::denies('vcard_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $vcard->delete();

        return back();
    }

    public function massDestroy(MassDestroyVcardRequest $request)
    {
        Vcard::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('vcard_create') && Gate::denies('vcard_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Vcard();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
