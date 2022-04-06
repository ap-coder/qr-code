@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.designColor.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.design-colors.update", [$designColor->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="primary">{{ trans('cruds.designColor.fields.primary') }}</label>
                <input class="form-control {{ $errors->has('primary') ? 'is-invalid' : '' }}" type="text" name="primary" id="primary" value="{{ old('primary', $designColor->primary) }}">
                @if($errors->has('primary'))
                    <span class="text-danger">{{ $errors->first('primary') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.designColor.fields.primary_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="button">{{ trans('cruds.designColor.fields.button') }}</label>
                <input class="form-control {{ $errors->has('button') ? 'is-invalid' : '' }}" type="text" name="button" id="button" value="{{ old('button', $designColor->button) }}">
                @if($errors->has('button'))
                    <span class="text-danger">{{ $errors->first('button') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.designColor.fields.button_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="secondary">{{ trans('cruds.designColor.fields.secondary') }}</label>
                <input class="form-control {{ $errors->has('secondary') ? 'is-invalid' : '' }}" type="text" name="secondary" id="secondary" value="{{ old('secondary', $designColor->secondary) }}">
                @if($errors->has('secondary'))
                    <span class="text-danger">{{ $errors->first('secondary') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.designColor.fields.secondary_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gradient">{{ trans('cruds.designColor.fields.gradient') }}</label>
                <input class="form-control {{ $errors->has('gradient') ? 'is-invalid' : '' }}" type="text" name="gradient" id="gradient" value="{{ old('gradient', $designColor->gradient) }}">
                @if($errors->has('gradient'))
                    <span class="text-danger">{{ $errors->first('gradient') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.designColor.fields.gradient_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="custom_color">{{ trans('cruds.designColor.fields.custom_color') }}</label>
                <input class="form-control {{ $errors->has('custom_color') ? 'is-invalid' : '' }}" type="text" name="custom_color" id="custom_color" value="{{ old('custom_color', $designColor->custom_color) }}">
                @if($errors->has('custom_color'))
                    <span class="text-danger">{{ $errors->first('custom_color') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.designColor.fields.custom_color_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="custom_button">{{ trans('cruds.designColor.fields.custom_button') }}</label>
                <input class="form-control {{ $errors->has('custom_button') ? 'is-invalid' : '' }}" type="text" name="custom_button" id="custom_button" value="{{ old('custom_button', $designColor->custom_button) }}">
                @if($errors->has('custom_button'))
                    <span class="text-danger">{{ $errors->first('custom_button') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.designColor.fields.custom_button_helper') }}</span>
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