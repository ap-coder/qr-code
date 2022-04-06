<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyImageGalleryRequest;
use App\Http\Requests\StoreImageGalleryRequest;
use App\Http\Requests\UpdateImageGalleryRequest;
use App\Models\ImageGallery;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ImageGalleryController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('image_gallery_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ImageGallery::with(['created_by'])->select(sprintf('%s.*', (new ImageGallery())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'image_gallery_show';
                $editGate = 'image_gallery_edit';
                $deleteGate = 'image_gallery_delete';
                $crudRoutePart = 'image-galleries';

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
            $table->editColumn('images', function ($row) {
                if (!$row->images) {
                    return '';
                }
                $links = [];
                foreach ($row->images as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank"><img src="' . $media->getUrl('thumb') . '" width="50px" height="50px"></a>';
                }

                return implode(' ', $links);
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->addColumn('created_by_name', function ($row) {
                return $row->created_by ? $row->created_by->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'active', 'images', 'created_by']);

            return $table->make(true);
        }

        return view('admin.imageGalleries.index');
    }

    public function create()
    {
        abort_if(Gate::denies('image_gallery_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.imageGalleries.create', compact('created_bies'));
    }

    public function store(StoreImageGalleryRequest $request)
    {
        $imageGallery = ImageGallery::create($request->all());

        foreach ($request->input('images', []) as $file) {
            $imageGallery->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('images');
        }

        if ($request->input('loading_image', false)) {
            $imageGallery->addMedia(storage_path('tmp/uploads/' . basename($request->input('loading_image'))))->toMediaCollection('loading_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $imageGallery->id]);
        }

        return redirect()->route('admin.image-galleries.index');
    }

    public function edit(ImageGallery $imageGallery)
    {
        abort_if(Gate::denies('image_gallery_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $imageGallery->load('created_by');

        return view('admin.imageGalleries.edit', compact('created_bies', 'imageGallery'));
    }

    public function update(UpdateImageGalleryRequest $request, ImageGallery $imageGallery)
    {
        $imageGallery->update($request->all());

        if (count($imageGallery->images) > 0) {
            foreach ($imageGallery->images as $media) {
                if (!in_array($media->file_name, $request->input('images', []))) {
                    $media->delete();
                }
            }
        }
        $media = $imageGallery->images->pluck('file_name')->toArray();
        foreach ($request->input('images', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $imageGallery->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('images');
            }
        }

        if ($request->input('loading_image', false)) {
            if (!$imageGallery->loading_image || $request->input('loading_image') !== $imageGallery->loading_image->file_name) {
                if ($imageGallery->loading_image) {
                    $imageGallery->loading_image->delete();
                }
                $imageGallery->addMedia(storage_path('tmp/uploads/' . basename($request->input('loading_image'))))->toMediaCollection('loading_image');
            }
        } elseif ($imageGallery->loading_image) {
            $imageGallery->loading_image->delete();
        }

        return redirect()->route('admin.image-galleries.index');
    }

    public function show(ImageGallery $imageGallery)
    {
        abort_if(Gate::denies('image_gallery_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $imageGallery->load('created_by');

        return view('admin.imageGalleries.show', compact('imageGallery'));
    }

    public function destroy(ImageGallery $imageGallery)
    {
        abort_if(Gate::denies('image_gallery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $imageGallery->delete();

        return back();
    }

    public function massDestroy(MassDestroyImageGalleryRequest $request)
    {
        ImageGallery::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('image_gallery_create') && Gate::denies('image_gallery_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ImageGallery();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
