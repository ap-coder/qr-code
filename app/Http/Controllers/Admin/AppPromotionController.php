<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAppPromotionRequest;
use App\Http\Requests\StoreAppPromotionRequest;
use App\Http\Requests\UpdateAppPromotionRequest;
use App\Models\AppPromotion;
use App\Models\DesignColor;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AppPromotionController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('app_promotion_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AppPromotion::with(['colors', 'created_by'])->select(sprintf('%s.*', (new AppPromotion())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'app_promotion_show';
                $editGate = 'app_promotion_edit';
                $deleteGate = 'app_promotion_delete';
                $crudRoutePart = 'app-promotions';

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
            $table->editColumn('app_name', function ($row) {
                return $row->app_name ? $row->app_name : '';
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->addColumn('created_by_name', function ($row) {
                return $row->created_by ? $row->created_by->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'active', 'created_by']);

            return $table->make(true);
        }

        return view('admin.appPromotions.index');
    }

    public function create()
    {
        abort_if(Gate::denies('app_promotion_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $colors = DesignColor::pluck('primary', 'id')->prepend(trans('global.pleaseSelect'), '');

        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.appPromotions.create', compact('colors', 'created_bies'));
    }

    public function store(StoreAppPromotionRequest $request)
    {
        $appPromotion = AppPromotion::create($request->all());

        if ($request->input('app_logo', false)) {
            $appPromotion->addMedia(storage_path('tmp/uploads/' . basename($request->input('app_logo'))))->toMediaCollection('app_logo');
        }

        if ($request->input('loading_image', false)) {
            $appPromotion->addMedia(storage_path('tmp/uploads/' . basename($request->input('loading_image'))))->toMediaCollection('loading_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $appPromotion->id]);
        }

        return redirect()->route('admin.app-promotions.index');
    }

    public function edit(AppPromotion $appPromotion)
    {
        abort_if(Gate::denies('app_promotion_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $colors = DesignColor::pluck('primary', 'id')->prepend(trans('global.pleaseSelect'), '');

        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $appPromotion->load('colors', 'created_by');

        return view('admin.appPromotions.edit', compact('appPromotion', 'colors', 'created_bies'));
    }

    public function update(UpdateAppPromotionRequest $request, AppPromotion $appPromotion)
    {
        $appPromotion->update($request->all());

        if ($request->input('app_logo', false)) {
            if (!$appPromotion->app_logo || $request->input('app_logo') !== $appPromotion->app_logo->file_name) {
                if ($appPromotion->app_logo) {
                    $appPromotion->app_logo->delete();
                }
                $appPromotion->addMedia(storage_path('tmp/uploads/' . basename($request->input('app_logo'))))->toMediaCollection('app_logo');
            }
        } elseif ($appPromotion->app_logo) {
            $appPromotion->app_logo->delete();
        }

        if ($request->input('loading_image', false)) {
            if (!$appPromotion->loading_image || $request->input('loading_image') !== $appPromotion->loading_image->file_name) {
                if ($appPromotion->loading_image) {
                    $appPromotion->loading_image->delete();
                }
                $appPromotion->addMedia(storage_path('tmp/uploads/' . basename($request->input('loading_image'))))->toMediaCollection('loading_image');
            }
        } elseif ($appPromotion->loading_image) {
            $appPromotion->loading_image->delete();
        }

        return redirect()->route('admin.app-promotions.index');
    }

    public function show(AppPromotion $appPromotion)
    {
        abort_if(Gate::denies('app_promotion_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appPromotion->load('colors', 'created_by');

        return view('admin.appPromotions.show', compact('appPromotion'));
    }

    public function destroy(AppPromotion $appPromotion)
    {
        abort_if(Gate::denies('app_promotion_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appPromotion->delete();

        return back();
    }

    public function massDestroy(MassDestroyAppPromotionRequest $request)
    {
        AppPromotion::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('app_promotion_create') && Gate::denies('app_promotion_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new AppPromotion();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
