@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.website.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.websites.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="form-check {{ $errors->has('active') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="active" value="0">
                    <input class="form-check-input" type="checkbox" name="active" id="active" value="1" {{ old('active', 0) == 1 || old('active') === null ? 'checked' : '' }}>
                    <label class="form-check-label" for="active">{{ trans('cruds.website.fields.active') }}</label>
                </div>
                @if($errors->has('active'))
                    <span class="text-danger">{{ $errors->first('active') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.website.fields.active_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="qr_name">{{ trans('cruds.website.fields.qr_name') }}</label>
                <input class="form-control {{ $errors->has('qr_name') ? 'is-invalid' : '' }}" type="text" name="qr_name" id="qr_name" value="{{ old('qr_name', '') }}">
                @if($errors->has('qr_name'))
                    <span class="text-danger">{{ $errors->first('qr_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.website.fields.qr_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="website_name">{{ trans('cruds.website.fields.website_name') }}</label>
                <input class="form-control {{ $errors->has('website_name') ? 'is-invalid' : '' }}" type="text" name="website_name" id="website_name" value="{{ old('website_name', '') }}">
                @if($errors->has('website_name'))
                    <span class="text-danger">{{ $errors->first('website_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.website.fields.website_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="url">{{ trans('cruds.website.fields.url') }}</label>
                <input class="form-control {{ $errors->has('url') ? 'is-invalid' : '' }}" type="text" name="url" id="url" value="{{ old('url', '') }}">
                @if($errors->has('url'))
                    <span class="text-danger">{{ $errors->first('url') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.website.fields.url_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="slug">{{ trans('cruds.website.fields.slug') }}</label>
                <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', '') }}">
                @if($errors->has('slug'))
                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.website.fields.slug_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="created_by_id">{{ trans('cruds.website.fields.created_by') }}</label>
                <select class="form-control select2 {{ $errors->has('created_by') ? 'is-invalid' : '' }}" name="created_by_id" id="created_by_id">
                    @foreach($created_bies as $id => $entry)
                        <option value="{{ $id }}" {{ old('created_by_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('created_by'))
                    <span class="text-danger">{{ $errors->first('created_by') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.website.fields.created_by_helper') }}</span>
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