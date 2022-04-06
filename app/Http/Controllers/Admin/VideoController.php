<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyVideoRequest;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;
use App\Models\DesignColor;
use App\Models\Social;
use App\Models\User;
use App\Models\Video;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class VideoController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('video_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Video::with(['created_by', 'design_colors', 'social_channels'])->select(sprintf('%s.*', (new Video())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'video_show';
                $editGate = 'video_edit';
                $deleteGate = 'video_delete';
                $crudRoutePart = 'videos';

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
            $table->addColumn('created_by_name', function ($row) {
                return $row->created_by ? $row->created_by->name : '';
            });

            $table->addColumn('design_colors_primary', function ($row) {
                return $row->design_colors ? $row->design_colors->primary : '';
            });

            $table->editColumn('design_colors.button', function ($row) {
                return $row->design_colors ? (is_string($row->design_colors) ? $row->design_colors : $row->design_colors->button) : '';
            });
            $table->editColumn('title', function ($row) {
                return $row->title ? $row->title : '';
            });
            $table->editColumn('social_channels', function ($row) {
                $labels = [];
                foreach ($row->social_channels as $social_channel) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $social_channel->social_name);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('loading_image', function ($row) {
                if ($photo = $row->loading_image) {
                    return sprintf(
        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
        $photo->url,
        $photo->thumbnail
    );
                }

                return '';
            });

            $table->rawColumns(['actions', 'placeholder', 'active', 'created_by', 'design_colors', 'social_channels', 'loading_image']);

            return $table->make(true);
        }

        return view('admin.videos.index');
    }

    public function create()
    {
        abort_if(Gate::denies('video_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $design_colors = DesignColor::pluck('primary', 'id')->prepend(trans('global.pleaseSelect'), '');

        $social_channels = Social::pluck('social_name', 'id');

        return view('admin.videos.create', compact('created_bies', 'design_colors', 'social_channels'));
    }

    public function store(StoreVideoRequest $request)
    {
        $video = Video::create($request->all());
        $video->social_channels()->sync($request->input('social_channels', []));
        if ($request->input('loading_image', false)) {
            $video->addMedia(storage_path('tmp/uploads/' . basename($request->input('loading_image'))))->toMediaCollection('loading_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $video->id]);
        }

        return redirect()->route('admin.videos.index');
    }

    public function edit(Video $video)
    {
        abort_if(Gate::denies('video_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $design_colors = DesignColor::pluck('primary', 'id')->prepend(trans('global.pleaseSelect'), '');

        $social_channels = Social::pluck('social_name', 'id');

        $video->load('created_by', 'design_colors', 'social_channels');

        return view('admin.videos.edit', compact('created_bies', 'design_colors', 'social_channels', 'video'));
    }

    public function update(UpdateVideoRequest $request, Video $video)
    {
        $video->update($request->all());
        $video->social_channels()->sync($request->input('social_channels', []));
        if ($request->input('loading_image', false)) {
            if (!$video->loading_image || $request->input('loading_image') !== $video->loading_image->file_name) {
                if ($video->loading_image) {
                    $video->loading_image->delete();
                }
                $video->addMedia(storage_path('tmp/uploads/' . basename($request->input('loading_image'))))->toMediaCollection('loading_image');
            }
        } elseif ($video->loading_image) {
            $video->loading_image->delete();
        }

        return redirect()->route('admin.videos.index');
    }

    public function show(Video $video)
    {
        abort_if(Gate::denies('video_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $video->load('created_by', 'design_colors', 'social_channels');

        return view('admin.videos.show', compact('video'));
    }

    public function destroy(Video $video)
    {
        abort_if(Gate::denies('video_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $video->delete();

        return back();
    }

    public function massDestroy(MassDestroyVideoRequest $request)
    {
        Video::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('video_create') && Gate::denies('video_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Video();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
