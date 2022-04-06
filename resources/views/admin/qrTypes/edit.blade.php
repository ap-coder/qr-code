@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.qrType.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.qr-types.update", [$qrType->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <div class="form-check {{ $errors->has('published') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="published" value="0">
                    <input class="form-check-input" type="checkbox" name="published" id="published" value="1" {{ $qrType->published || old('published', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="published">{{ trans('cruds.qrType.fields.published') }}</label>
                </div>
                @if($errors->has('published'))
                    <span class="text-danger">{{ $errors->first('published') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.qrType.fields.published_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title">{{ trans('cruds.qrType.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $qrType->title) }}">
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.qrType.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="subtitle">{{ trans('cruds.qrType.fields.subtitle') }}</label>
                <input class="form-control {{ $errors->has('subtitle') ? 'is-invalid' : '' }}" type="text" name="subtitle" id="subtitle" value="{{ old('subtitle', $qrType->subtitle) }}">
                @if($errors->has('subtitle'))
                    <span class="text-danger">{{ $errors->first('subtitle') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.qrType.fields.subtitle_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mock_image">{{ trans('cruds.qrType.fields.mock_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('mock_image') ? 'is-invalid' : '' }}" id="mock_image-dropzone">
                </div>
                @if($errors->has('mock_image'))
                    <span class="text-danger">{{ $errors->first('mock_image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.qrType.fields.mock_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hover_over_image">{{ trans('cruds.qrType.fields.hover_over_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('hover_over_image') ? 'is-invalid' : '' }}" id="hover_over_image-dropzone">
                </div>
                @if($errors->has('hover_over_image'))
                    <span class="text-danger">{{ $errors->first('hover_over_image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.qrType.fields.hover_over_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.qrType.fields.select_type') }}</label>
                <select class="form-control {{ $errors->has('select_type') ? 'is-invalid' : '' }}" name="select_type" id="select_type">
                    <option value disabled {{ old('select_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\QrType::SELECT_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('select_type', $qrType->select_type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('select_type'))
                    <span class="text-danger">{{ $errors->first('select_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.qrType.fields.select_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="industries">{{ trans('cruds.qrType.fields.industries') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('industries') ? 'is-invalid' : '' }}" name="industries[]" id="industries" multiple>
                    @foreach($industries as $id => $industry)
                        <option value="{{ $id }}" {{ (in_array($id, old('industries', [])) || $qrType->industries->contains($id)) ? 'selected' : '' }}>{{ $industry }}</option>
                    @endforeach
                </select>
                @if($errors->has('industries'))
                    <span class="text-danger">{{ $errors->first('industries') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.qrType.fields.industries_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="icon_class">{{ trans('cruds.qrType.fields.icon_class') }}</label>
                <input class="form-control {{ $errors->has('icon_class') ? 'is-invalid' : '' }}" type="text" name="icon_class" id="icon_class" value="{{ old('icon_class', $qrType->icon_class) }}">
                @if($errors->has('icon_class'))
                    <span class="text-danger">{{ $errors->first('icon_class') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.qrType.fields.icon_class_helper') }}</span>
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
    Dropzone.options.mockImageDropzone = {
    url: '{{ route('admin.qr-types.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 350,
      height: 600
    },
    success: function (file, response) {
      $('form').find('input[name="mock_image"]').remove()
      $('form').append('<input type="hidden" name="mock_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="mock_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($qrType) && $qrType->mock_image)
      var file = {!! json_encode($qrType->mock_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="mock_image" value="' + file.file_name + '">')
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
    Dropzone.options.hoverOverImageDropzone = {
    url: '{{ route('admin.qr-types.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 400,
      height: 600
    },
    success: function (file, response) {
      $('form').find('input[name="hover_over_image"]').remove()
      $('form').append('<input type="hidden" name="hover_over_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="hover_over_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($qrType) && $qrType->hover_over_image)
      var file = {!! json_encode($qrType->hover_over_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="hover_over_image" value="' + file.file_name + '">')
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