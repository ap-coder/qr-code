@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.socialChannel.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.social-channels.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.socialChannel.fields.id') }}
                        </th>
                        <td>
                            {{ $socialChannel->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.socialChannel.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $socialChannel->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.socialChannel.fields.qr_name') }}
                        </th>
                        <td>
                            {{ $socialChannel->qr_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.socialChannel.fields.header_image') }}
                        </th>
                        <td>
                            @if($socialChannel->header_image)
                                <a href="{{ $socialChannel->header_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $socialChannel->header_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.socialChannel.fields.summery') }}
                        </th>
                        <td>
                            {{ $socialChannel->summery }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.socialChannel.fields.loading_image') }}
                        </th>
                        <td>
                            @if($socialChannel->loading_image)
                                <a href="{{ $socialChannel->loading_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $socialChannel->loading_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.socialChannel.fields.slug') }}
                        </th>
                        <td>
                            {{ $socialChannel->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.socialChannel.fields.socials') }}
                        </th>
                        <td>
                            @foreach($socialChannel->socials as $key => $socials)
                                <span class="label label-info">{{ $socials->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.socialChannel.fields.created_by') }}
                        </th>
                        <td>
                            {{ $socialChannel->created_by->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.social-channels.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection