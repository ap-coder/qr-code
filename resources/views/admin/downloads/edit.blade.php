@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.download.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.downloads.update", [$download->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.download.fields.frame') }}</label>
                <select class="form-control {{ $errors->has('frame') ? 'is-invalid' : '' }}" name="frame" id="frame">
                    <option value disabled {{ old('frame', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Download::FRAME_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('frame', $download->frame) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('frame'))
                    <span class="text-danger">{{ $errors->first('frame') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.download.fields.frame_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="frame_color">{{ trans('cruds.download.fields.frame_color') }}</label>
                <input class="form-control {{ $errors->has('frame_color') ? 'is-invalid' : '' }}" type="text" name="frame_color" id="frame_color" value="{{ old('frame_color', $download->frame_color) }}">
                @if($errors->has('frame_color'))
                    <span class="text-danger">{{ $errors->first('frame_color') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.download.fields.frame_color_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="frame_text">{{ trans('cruds.download.fields.frame_text') }}</label>
                <input class="form-control {{ $errors->has('frame_text') ? 'is-invalid' : '' }}" type="text" name="frame_text" id="frame_text" value="{{ old('frame_text', $download->frame_text) }}">
                @if($errors->has('frame_text'))
                    <span class="text-danger">{{ $errors->first('frame_text') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.download.fields.frame_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="logo">{{ trans('cruds.download.fields.logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('logo') ? 'is-invalid' : '' }}" id="logo-dropzone">
                </div>
                @if($errors->has('logo'))
                    <span class="text-danger">{{ $errors->first('logo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.download.fields.logo_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.download.fields.code') }}</label>
                <select class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" name="code" id="code">
                    <option value disabled {{ old('code', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Download::CODE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('code', $download->code) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('code'))
                    <span class="text-danger">{{ $errors->first('code') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.download.fields.code_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="qr_color_id">{{ trans('cruds.download.fields.qr_color') }}</label>
                <select class="form-control select2 {{ $errors->has('qr_color') ? 'is-invalid' : '' }}" name="qr_color_id" id="qr_color_id">
                    @foreach($qr_colors as $id => $entry)
                        <option value="{{ $id }}" {{ (old('qr_color_id') ? old('qr_color_id') : $download->qr_color->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('qr_color'))
                    <span class="text-danger">{{ $errors->first('qr_color') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.download.fields.qr_color_helper') }}</span>
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
    Dropzone.options.logoDropzone = {
    url: '{{ route('admin.downloads.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 200,
      height: 200
    },
    success: function (file, response) {
      $('form').find('input[name="logo"]').remove()
      $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($download) && $download->logo)
      var file = {!! json_encode($download->logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
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