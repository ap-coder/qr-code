<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBusinessPageRequest;
use App\Http\Requests\StoreBusinessPageRequest;
use App\Http\Requests\UpdateBusinessPageRequest;
use App\Models\BusinessPage;
use App\Models\Hour;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BusinessPageController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('business_page_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = BusinessPage::with(['hours', 'created_by'])->select(sprintf('%s.*', (new BusinessPage())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'business_page_show';
                $editGate = 'business_page_edit';
                $deleteGate = 'business_page_delete';
                $crudRoutePart = 'business-pages';

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
            $table->editColumn('qr_name', function ($row) {
                return $row->qr_name ? $row->qr_name : '';
            });
            $table->editColumn('company', function ($row) {
                return $row->company ? $row->company : '';
            });
            $table->editColumn('headline', function ($row) {
                return $row->headline ? $row->headline : '';
            });
            $table->addColumn('created_by_name', function ($row) {
                return $row->created_by ? $row->created_by->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'created_by']);

            return $table->make(true);
        }

        return view('admin.businessPages.index');
    }

    public function create()
    {
        abort_if(Gate::denies('business_page_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hours = Hour::pluck('day', 'id');

        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.businessPages.create', compact('created_bies', 'hours'));
    }

    public function store(StoreBusinessPageRequest $request)
    {
        $businessPage = BusinessPage::create($request->all());
        $businessPage->hours()->sync($request->input('hours', []));
        if ($request->input('header_image', false)) {
            $businessPage->addMedia(storage_path('tmp/uploads/' . basename($request->input('header_image'))))->toMediaCollection('header_image');
        }

        if ($request->input('loading_image', false)) {
            $businessPage->addMedia(storage_path('tmp/uploads/' . basename($request->input('loading_image'))))->toMediaCollection('loading_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $businessPage->id]);
        }

        return redirect()->route('admin.business-pages.index');
    }

    public function edit(BusinessPage $businessPage)
    {
        abort_if(Gate::denies('business_page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hours = Hour::pluck('day', 'id');

        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $businessPage->load('hours', 'created_by');

        return view('admin.businessPages.edit', compact('businessPage', 'created_bies', 'hours'));
    }

    public function update(UpdateBusinessPageRequest $request, BusinessPage $businessPage)
    {
        $businessPage->update($request->all());
        $businessPage->hours()->sync($request->input('hours', []));
        if ($request->input('header_image', false)) {
            if (!$businessPage->header_image || $request->input('header_image') !== $businessPage->header_image->file_name) {
                if ($businessPage->header_image) {
                    $businessPage->header_image->delete();
                }
                $businessPage->addMedia(storage_path('tmp/uploads/' . basename($request->input('header_image'))))->toMediaCollection('header_image');
            }
        } elseif ($businessPage->header_image) {
            $businessPage->header_image->delete();
        }

        if ($request->input('loading_image', false)) {
            if (!$businessPage->loading_image || $request->input('loading_image') !== $businessPage->loading_image->file_name) {
                if ($businessPage->loading_image) {
                    $businessPage->loading_image->delete();
                }
                $businessPage->addMedia(storage_path('tmp/uploads/' . basename($request->input('loading_image'))))->toMediaCollection('loading_image');
            }
        } elseif ($businessPage->loading_image) {
            $businessPage->loading_image->delete();
        }

        return redirect()->route('admin.business-pages.index');
    }

    public function show(BusinessPage $businessPage)
    {
        abort_if(Gate::denies('business_page_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $businessPage->load('hours', 'created_by', 'businessPagesQrCodes');

        return view('admin.businessPages.show', compact('businessPage'));
    }

    public function destroy(BusinessPage $businessPage)
    {
        abort_if(Gate::denies('business_page_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $businessPage->delete();

        return back();
    }

    public function massDestroy(MassDestroyBusinessPageRequest $request)
    {
        BusinessPage::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('business_page_create') && Gate::denies('business_page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new BusinessPage();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
