@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.appPromotion.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.app-promotions.update", [$appPromotion->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <div class="form-check {{ $errors->has('active') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="active" value="0">
                    <input class="form-check-input" type="checkbox" name="active" id="active" value="1" {{ $appPromotion->active || old('active', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="active">{{ trans('cruds.appPromotion.fields.active') }}</label>
                </div>
                @if($errors->has('active'))
                    <span class="text-danger">{{ $errors->first('active') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appPromotion.fields.active_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="qr_name">{{ trans('cruds.appPromotion.fields.qr_name') }}</label>
                <input class="form-control {{ $errors->has('qr_name') ? 'is-invalid' : '' }}" type="text" name="qr_name" id="qr_name" value="{{ old('qr_name', $appPromotion->qr_name) }}">
                @if($errors->has('qr_name'))
                    <span class="text-danger">{{ $errors->first('qr_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appPromotion.fields.qr_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="colors_id">{{ trans('cruds.appPromotion.fields.colors') }}</label>
                <select class="form-control select2 {{ $errors->has('colors') ? 'is-invalid' : '' }}" name="colors_id" id="colors_id">
                    @foreach($colors as $id => $entry)
                        <option value="{{ $id }}" {{ (old('colors_id') ? old('colors_id') : $appPromotion->colors->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('colors'))
                    <span class="text-danger">{{ $errors->first('colors') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appPromotion.fields.colors_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="app_name">{{ trans('cruds.appPromotion.fields.app_name') }}</label>
                <input class="form-control {{ $errors->has('app_name') ? 'is-invalid' : '' }}" type="text" name="app_name" id="app_name" value="{{ old('app_name', $appPromotion->app_name) }}">
                @if($errors->has('app_name'))
                    <span class="text-danger">{{ $errors->first('app_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appPromotion.fields.app_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="developer">{{ trans('cruds.appPromotion.fields.developer') }}</label>
                <input class="form-control {{ $errors->has('developer') ? 'is-invalid' : '' }}" type="text" name="developer" id="developer" value="{{ old('developer', $appPromotion->developer) }}">
                @if($errors->has('developer'))
                    <span class="text-danger">{{ $errors->first('developer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appPromotion.fields.developer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="app_logo">{{ trans('cruds.appPromotion.fields.app_logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('app_logo') ? 'is-invalid' : '' }}" id="app_logo-dropzone">
                </div>
                @if($errors->has('app_logo'))
                    <span class="text-danger">{{ $errors->first('app_logo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appPromotion.fields.app_logo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title">{{ trans('cruds.appPromotion.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $appPromotion->title) }}">
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appPromotion.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.appPromotion.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description', $appPromotion->description) }}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appPromotion.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="website">{{ trans('cruds.appPromotion.fields.website') }}</label>
                <input class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}" type="text" name="website" id="website" value="{{ old('website', $appPromotion->website) }}">
                @if($errors->has('website'))
                    <span class="text-danger">{{ $errors->first('website') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appPromotion.fields.website_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="button_text">{{ trans('cruds.appPromotion.fields.button_text') }}</label>
                <input class="form-control {{ $errors->has('button_text') ? 'is-invalid' : '' }}" type="text" name="button_text" id="button_text" value="{{ old('button_text', $appPromotion->button_text) }}">
                @if($errors->has('button_text'))
                    <span class="text-danger">{{ $errors->first('button_text') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appPromotion.fields.button_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="button_link">{{ trans('cruds.appPromotion.fields.button_link') }}</label>
                <input class="form-control {{ $errors->has('button_link') ? 'is-invalid' : '' }}" type="text" name="button_link" id="button_link" value="{{ old('button_link', $appPromotion->button_link) }}">
                @if($errors->has('button_link'))
                    <span class="text-danger">{{ $errors->first('button_link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appPromotion.fields.button_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="button_icon_class">{{ trans('cruds.appPromotion.fields.button_icon_class') }}</label>
                <input class="form-control {{ $errors->has('button_icon_class') ? 'is-invalid' : '' }}" type="text" name="button_icon_class" id="button_icon_class" value="{{ old('button_icon_class', $appPromotion->button_icon_class) }}">
                @if($errors->has('button_icon_class'))
                    <span class="text-danger">{{ $errors->first('button_icon_class') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appPromotion.fields.button_icon_class_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="apple_store_link">{{ trans('cruds.appPromotion.fields.apple_store_link') }}</label>
                <input class="form-control {{ $errors->has('apple_store_link') ? 'is-invalid' : '' }}" type="text" name="apple_store_link" id="apple_store_link" value="{{ old('apple_store_link', $appPromotion->apple_store_link) }}">
                @if($errors->has('apple_store_link'))
                    <span class="text-danger">{{ $errors->first('apple_store_link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appPromotion.fields.apple_store_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="google_play_link">{{ trans('cruds.appPromotion.fields.google_play_link') }}</label>
                <input class="form-control {{ $errors->has('google_play_link') ? 'is-invalid' : '' }}" type="text" name="google_play_link" id="google_play_link" value="{{ old('google_play_link', $appPromotion->google_play_link) }}">
                @if($errors->has('google_play_link'))
                    <span class="text-danger">{{ $errors->first('google_play_link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appPromotion.fields.google_play_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="amazon_app_link">{{ trans('cruds.appPromotion.fields.amazon_app_link') }}</label>
                <input class="form-control {{ $errors->has('amazon_app_link') ? 'is-invalid' : '' }}" type="text" name="amazon_app_link" id="amazon_app_link" value="{{ old('amazon_app_link', $appPromotion->amazon_app_link) }}">
                @if($errors->has('amazon_app_link'))
                    <span class="text-danger">{{ $errors->first('amazon_app_link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appPromotion.fields.amazon_app_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="loading_image">{{ trans('cruds.appPromotion.fields.loading_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('loading_image') ? 'is-invalid' : '' }}" id="loading_image-dropzone">
                </div>
                @if($errors->has('loading_image'))
                    <span class="text-danger">{{ $errors->first('loading_image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appPromotion.fields.loading_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="created_by_id">{{ trans('cruds.appPromotion.fields.created_by') }}</label>
                <select class="form-control select2 {{ $errors->has('created_by') ? 'is-invalid' : '' }}" name="created_by_id" id="created_by_id">
                    @foreach($created_bies as $id => $entry)
                        <option value="{{ $id }}" {{ (old('created_by_id') ? old('created_by_id') : $appPromotion->created_by->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('created_by'))
                    <span class="text-danger">{{ $errors->first('created_by') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.appPromotion.fields.created_by_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.appLogoDropzone = {
    url: '{{ route('admin.app-promotions.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 180,
      height: 180
    },
    success: function (file, response) {
      $('form').find('input[name="app_logo"]').remove()
      $('form').append('<input type="hidden" name="app_logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="app_logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($appPromotion) && $appPromotion->app_logo)
      var file = {!! json_encode($appPromotion->app_logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="app_logo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
<script>
    Dropzone.options.loadingImageDropzone = {
    url: '{{ route('admin.app-promotions.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 600,
      height: 600
    },
    success: function (file, response) {
      $('form').find('input[name="loading_image"]').remove()
      $('form').append('<input type="hidden" name="loading_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="loading_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($appPromotion) && $appPromotion->loading_image)
      var file = {!! json_encode($appPromotion->loading_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="loading_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection