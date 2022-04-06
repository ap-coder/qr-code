@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.qrColor.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.qr-colors.update", [$qrColor->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="color">{{ trans('cruds.qrColor.fields.color') }}</label>
                <input class="form-control {{ $errors->has('color') ? 'is-invalid' : '' }}" type="text" name="color" id="color" value="{{ old('color', $qrColor->color) }}">
                @if($errors->has('color'))
                    <span class="text-danger">{{ $errors->first('color') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.qrColor.fields.color_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="color_hex">{{ trans('cruds.qrColor.fields.color_hex') }}</label>
                <input class="form-control {{ $errors->has('color_hex') ? 'is-invalid' : '' }}" type="text" name="color_hex" id="color_hex" value="{{ old('color_hex', $qrColor->color_hex) }}">
                @if($errors->has('color_hex'))
                    <span class="text-danger">{{ $errors->first('color_hex') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.qrColor.fields.color_hex_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="primary">{{ trans('cruds.qrColor.fields.primary') }}</label>
                <input class="form-control {{ $errors->has('primary') ? 'is-invalid' : '' }}" type="text" name="primary" id="primary" value="{{ old('primary', $qrColor->primary) }}">
                @if($errors->has('primary'))
                    <span class="text-danger">{{ $errors->first('primary') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.qrColor.fields.primary_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="button">{{ trans('cruds.qrColor.fields.button') }}</label>
                <input class="form-control {{ $errors->has('button') ? 'is-invalid' : '' }}" type="text" name="button" id="button" value="{{ old('button', $qrColor->button) }}">
                @if($errors->has('button'))
                    <span class="text-danger">{{ $errors->first('button') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.qrColor.fields.button_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gradient">{{ trans('cruds.qrColor.fields.gradient') }}</label>
                <input class="form-control {{ $errors->has('gradient') ? 'is-invalid' : '' }}" type="text" name="gradient" id="gradient" value="{{ old('gradient', $qrColor->gradient) }}">
                @if($errors->has('gradient'))
                    <span class="text-danger">{{ $errors->first('gradient') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.qrColor.fields.gradient_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="secondary">{{ trans('cruds.qrColor.fields.secondary') }}</label>
                <input class="form-control {{ $errors->has('secondary') ? 'is-invalid' : '' }}" type="text" name="secondary" id="secondary" value="{{ old('secondary', $qrColor->secondary) }}">
                @if($errors->has('secondary'))
                    <span class="text-danger">{{ $errors->first('secondary') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.qrColor.fields.secondary_helper') }}</span>
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