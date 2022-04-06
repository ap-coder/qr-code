<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroySocialChannelRequest;
use App\Http\Requests\StoreSocialChannelRequest;
use App\Http\Requests\UpdateSocialChannelRequest;
use App\Models\Social;
use App\Models\SocialChannel;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SocialChannelController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('social_channel_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = SocialChannel::with(['socials', 'created_by'])->select(sprintf('%s.*', (new SocialChannel())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'social_channel_show';
                $editGate = 'social_channel_edit';
                $deleteGate = 'social_channel_delete';
                $crudRoutePart = 'social-channels';

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

            $table->rawColumns(['actions', 'placeholder', 'active', 'created_by']);

            return $table->make(true);
        }

        return view('admin.socialChannels.index');
    }

    public function create()
    {
        abort_if(Gate::denies('social_channel_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $socials = Social::pluck('title', 'id');

        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.socialChannels.create', compact('created_bies', 'socials'));
    }

    public function store(StoreSocialChannelRequest $request)
    {
        $socialChannel = SocialChannel::create($request->all());
        $socialChannel->socials()->sync($request->input('socials', []));
        if ($request->input('header_image', false)) {
            $socialChannel->addMedia(storage_path('tmp/uploads/' . basename($request->input('header_image'))))->toMediaCollection('header_image');
        }

        if ($request->input('loading_image', false)) {
            $socialChannel->addMedia(storage_path('tmp/uploads/' . basename($request->input('loading_image'))))->toMediaCollection('loading_image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $socialChannel->id]);
        }

        return redirect()->route('admin.social-channels.index');
    }

    public function edit(SocialChannel $socialChannel)
    {
        abort_if(Gate::denies('social_channel_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $socials = Social::pluck('title', 'id');

        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $socialChannel->load('socials', 'created_by');

        return view('admin.socialChannels.edit', compact('created_bies', 'socialChannel', 'socials'));
    }

    public function update(UpdateSocialChannelRequest $request, SocialChannel $socialChannel)
    {
        $socialChannel->update($request->all());
        $socialChannel->socials()->sync($request->input('socials', []));
        if ($request->input('header_image', false)) {
            if (!$socialChannel->header_image || $request->input('header_image') !== $socialChannel->header_image->file_name) {
                if ($socialChannel->header_image) {
                    $socialChannel->header_image->delete();
                }
                $socialChannel->addMedia(storage_path('tmp/uploads/' . basename($request->input('header_image'))))->toMediaCollection('header_image');
            }
        } elseif ($socialChannel->header_image) {
            $socialChannel->header_image->delete();
        }

        if ($request->input('loading_image', false)) {
            if (!$socialChannel->loading_image || $request->input('loading_image') !== $socialChannel->loading_image->file_name) {
                if ($socialChannel->loading_image) {
                    $socialChannel->loading_image->delete();
                }
                $socialChannel->addMedia(storage_path('tmp/uploads/' . basename($request->input('loading_image'))))->toMediaCollection('loading_image');
            }
        } elseif ($socialChannel->loading_image) {
            $socialChannel->loading_image->delete();
        }

        return redirect()->route('admin.social-channels.index');
    }

    public function show(SocialChannel $socialChannel)
    {
        abort_if(Gate::denies('social_channel_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $socialChannel->load('socials', 'created_by');

        return view('admin.socialChannels.show', compact('socialChannel'));
    }

    public function destroy(SocialChannel $socialChannel)
    {
        abort_if(Gate::denies('social_channel_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $socialChannel->delete();

        return back();
    }

    public function massDestroy(MassDestroySocialChannelRequest $request)
    {
        SocialChannel::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('social_channel_create') && Gate::denies('social_channel_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new SocialChannel();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
