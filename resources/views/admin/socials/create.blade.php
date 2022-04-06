@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.social.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.socials.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">{{ trans('cruds.social.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}">
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.social.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="social_name">{{ trans('cruds.social.fields.social_name') }}</label>
                <input class="form-control {{ $errors->has('social_name') ? 'is-invalid' : '' }}" type="text" name="social_name" id="social_name" value="{{ old('social_name', '') }}">
                @if($errors->has('social_name'))
                    <span class="text-danger">{{ $errors->first('social_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.social.fields.social_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="url">{{ trans('cruds.social.fields.url') }}</label>
                <input class="form-control {{ $errors->has('url') ? 'is-invalid' : '' }}" type="text" name="url" id="url" value="{{ old('url', '') }}">
                @if($errors->has('url'))
                    <span class="text-danger">{{ $errors->first('url') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.social.fields.url_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="channel_name">{{ trans('cruds.social.fields.channel_name') }}</label>
                <input class="form-control {{ $errors->has('channel_name') ? 'is-invalid' : '' }}" type="text" name="channel_name" id="channel_name" value="{{ old('channel_name', '') }}">
                @if($errors->has('channel_name'))
                    <span class="text-danger">{{ $errors->first('channel_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.social.fields.channel_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="icon_class">{{ trans('cruds.social.fields.icon_class') }}</label>
                <input class="form-control {{ $errors->has('icon_class') ? 'is-invalid' : '' }}" type="text" name="icon_class" id="icon_class" value="{{ old('icon_class', '') }}">
                @if($errors->has('icon_class'))
                    <span class="text-danger">{{ $errors->first('icon_class') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.social.fields.icon_class_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection