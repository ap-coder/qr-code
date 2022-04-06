@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.address.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.addresses.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="form-check {{ $errors->has('published') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="published" value="0">
                    <input class="form-check-input" type="checkbox" name="published" id="published" value="1" {{ old('published', 0) == 1 || old('published') === null ? 'checked' : '' }}>
                    <label class="form-check-label" for="published">{{ trans('cruds.address.fields.published') }}</label>
                </div>
                @if($errors->has('published'))
                    <span class="text-danger">{{ $errors->first('published') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.published_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nickname">{{ trans('cruds.address.fields.nickname') }}</label>
                <input class="form-control {{ $errors->has('nickname') ? 'is-invalid' : '' }}" type="text" name="nickname" id="nickname" value="{{ old('nickname', '') }}">
                @if($errors->has('nickname'))
                    <span class="text-danger">{{ $errors->first('nickname') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.nickname_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.address.fields.address') }}</label>
                <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" type="text" name="address" id="address" value="{{ old('address', '') }}">
                @if($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address_2">{{ trans('cruds.address.fields.address_2') }}</label>
                <input class="form-control {{ $errors->has('address_2') ? 'is-invalid' : '' }}" type="text" name="address_2" id="address_2" value="{{ old('address_2', '') }}">
                @if($errors->has('address_2'))
                    <span class="text-danger">{{ $errors->first('address_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.address_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="city">{{ trans('cruds.address.fields.city') }}</label>
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', '') }}">
                @if($errors->has('city'))
                    <span class="text-danger">{{ $errors->first('city') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="state">{{ trans('cruds.address.fields.state') }}</label>
                <input class="form-control {{ $errors->has('state') ? 'is-invalid' : '' }}" type="text" name="state" id="state" value="{{ old('state', '') }}">
                @if($errors->has('state'))
                    <span class="text-danger">{{ $errors->first('state') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.state_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="zipcode">{{ trans('cruds.address.fields.zipcode') }}</label>
                <input class="form-control {{ $errors->has('zipcode') ? 'is-invalid' : '' }}" type="text" name="zipcode" id="zipcode" value="{{ old('zipcode', '') }}">
                @if($errors->has('zipcode'))
                    <span class="text-danger">{{ $errors->first('zipcode') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.zipcode_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="full_address">{{ trans('cruds.address.fields.full_address') }}</label>
                <input class="form-control {{ $errors->has('full_address') ? 'is-invalid' : '' }}" type="text" name="full_address" id="full_address" value="{{ old('full_address', '') }}">
                @if($errors->has('full_address'))
                    <span class="text-danger">{{ $errors->first('full_address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.full_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="slug">{{ trans('cruds.address.fields.slug') }}</label>
                <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', '') }}">
                @if($errors->has('slug'))
                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.address.fields.slug_helper') }}</span>
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