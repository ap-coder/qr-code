@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.socialChannel.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.social-channels.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="form-check {{ $errors->has('active') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="active" value="0">
                    <input class="form-check-input" type="checkbox" name="active" id="active" value="1" {{ old('active', 0) == 1 || old('active') === null ? 'checked' : '' }}>
                    <label class="form-check-label" for="active">{{ trans('cruds.socialChannel.fields.active') }}</label>
                </div>
                @if($errors->has('active'))
                    <span class="text-danger">{{ $errors->first('active') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.socialChannel.fields.active_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="qr_name">{{ trans('cruds.socialChannel.fields.qr_name') }}</label>
                <input class="form-control {{ $errors->has('qr_name') ? 'is-invalid' : '' }}" type="text" name="qr_name" id="qr_name" value="{{ old('qr_name', '') }}">
                @if($errors->has('qr_name'))
                    <span class="text-danger">{{ $errors->first('qr_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.socialChannel.fields.qr_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="header_image">{{ trans('cruds.socialChannel.fields.header_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('header_image') ? 'is-invalid' : '' }}" id="header_image-dropzone">
                </div>
                @if($errors->has('header_image'))
                    <span class="text-danger">{{ $errors->first('header_image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.socialChannel.fields.header_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="summery">{{ trans('cruds.socialChannel.fields.summery') }}</label>
                <input class="form-control {{ $errors->has('summery') ? 'is-invalid' : '' }}" type="text" name="summery" id="summery" value="{{ old('summery', '') }}">
                @if($errors->has('summery'))
                    <span class="text-danger">{{ $errors->first('summery') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.socialChannel.fields.summery_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="loading_image">{{ trans('cruds.socialChannel.fields.loading_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('loading_image') ? 'is-invalid' : '' }}" id="loading_image-dropzone">
                </div>
                @if($errors->has('loading_image'))
                    <span class="text-danger">{{ $errors->first('loading_image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.socialChannel.fields.loading_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="slug">{{ trans('cruds.socialChannel.fields.slug') }}</label>
                <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', '') }}">
                @if($errors->has('slug'))
                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.socialChannel.fields.slug_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="socials">{{ trans('cruds.socialChannel.fields.socials') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('socials') ? 'is-invalid' : '' }}" name="socials[]" id="socials" multiple>
                    @foreach($socials as $id => $social)
                        <option value="{{ $id }}" {{ in_array($id, old('socials', [])) ? 'selected' : '' }}>{{ $social }}</option>
                    @endforeach
                </select>
                @if($errors->has('socials'))
                    <span class="text-danger">{{ $errors->first('socials') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.socialChannel.fields.socials_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="created_by_id">{{ trans('cruds.socialChannel.fields.created_by') }}</label>
                <select class="form-control select2 {{ $errors->has('created_by') ? 'is-invalid' : '' }}" name="created_by_id" id="created_by_id">
                    @foreach($created_bies as $id => $entry)
                        <option value="{{ $id }}" {{ old('created_by_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('created_by'))
                    <span class="text-danger">{{ $errors->first('created_by') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.socialChannel.fields.created_by_helper') }}</span>
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
    Dropzone.options.headerImageDropzone = {
    url: '{{ route('admin.social-channels.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 640,
      height: 360
    },
    success: function (file, response) {
      $('form').find('input[name="header_image"]').remove()
      $('form').append('<input type="hidden" name="header_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="header_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($socialChannel) && $socialChannel->header_image)
      var file = {!! json_encode($socialChannel->header_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="header_image" value="' + file.file_name + '">')
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
    url: '{{ route('admin.social-channels.storeMedia') }}',
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
@if(isset($socialChannel) && $socialChannel->loading_image)
      var file = {!! json_encode($socialChannel->loading_image) !!}
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