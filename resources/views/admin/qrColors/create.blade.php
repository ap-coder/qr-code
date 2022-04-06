@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.qrColor.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.qr-colors.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="color">{{ trans('cruds.qrColor.fields.color') }}</label>
                <input class="form-control {{ $errors->has('color') ? 'is-invalid' : '' }}" type="text" name="color" id="color" value="{{ old('color', '#000000') }}">
                @if($errors->has('color'))
                    <span class="text-danger">{{ $errors->first('color') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.qrColor.fields.color_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="corner_inner">{{ trans('cruds.qrColor.fields.corner_inner') }}</label>
                <input class="form-control {{ $errors->has('corner_inner') ? 'is-invalid' : '' }}" type="text" name="corner_inner" id="corner_inner" value="{{ old('corner_inner', '#d32f2f') }}">
                @if($errors->has('corner_inner'))
                    <span class="text-danger">{{ $errors->first('corner_inner') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.qrColor.fields.corner_inner_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="corner_outer">{{ trans('cruds.qrColor.fields.corner_outer') }}</label>
                <input class="form-control {{ $errors->has('corner_outer') ? 'is-invalid' : '' }}" type="text" name="corner_outer" id="corner_outer" value="{{ old('corner_outer', '#000000') }}">
                @if($errors->has('corner_outer'))
                    <span class="text-danger">{{ $errors->first('corner_outer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.qrColor.fields.corner_outer_helper') }}</span>
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