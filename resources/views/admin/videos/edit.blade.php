@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.video.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.videos.update", [$video->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <div class="form-check {{ $errors->has('active') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="active" value="0">
                    <input class="form-check-input" type="checkbox" name="active" id="active" value="1" {{ $video->active || old('active', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="active">{{ trans('cruds.video.fields.active') }}</label>
                </div>
                @if($errors->has('active'))
                    <span class="text-danger">{{ $errors->first('active') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.video.fields.active_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="qr_name">{{ trans('cruds.video.fields.qr_name') }}</label>
                <input class="form-control {{ $errors->has('qr_name') ? 'is-invalid' : '' }}" type="text" name="qr_name" id="qr_name" value="{{ old('qr_name', $video->qr_name) }}">
                @if($errors->has('qr_name'))
                    <span class="text-danger">{{ $errors->first('qr_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.video.fields.qr_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="created_by_id">{{ trans('cruds.video.fields.created_by') }}</label>
                <select class="form-control select2 {{ $errors->has('created_by') ? 'is-invalid' : '' }}" name="created_by_id" id="created_by_id">
                    @foreach($created_bies as $id => $entry)
                        <option value="{{ $id }}" {{ (old('created_by_id') ? old('created_by_id') : $video->created_by->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('created_by'))
                    <span class="text-danger">{{ $errors->first('created_by') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.video.fields.created_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="design_colors_id">{{ trans('cruds.video.fields.design_colors') }}</label>
                <select class="form-control select2 {{ $errors->has('design_colors') ? 'is-invalid' : '' }}" name="design_colors_id" id="design_colors_id">
                    @foreach($design_colors as $id => $entry)
                        <option value="{{ $id }}" {{ (old('design_colors_id') ? old('design_colors_id') : $video->design_colors->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('design_colors'))
                    <span class="text-danger">{{ $errors->first('design_colors') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.video.fields.design_colors_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title">{{ trans('cruds.video.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $video->title) }}">
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.video.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="headline">{{ trans('cruds.video.fields.headline') }}</label>
                <input class="form-control {{ $errors->has('headline') ? 'is-invalid' : '' }}" type="text" name="headline" id="headline" value="{{ old('headline', $video->headline) }}">
                @if($errors->has('headline'))
                    <span class="text-danger">{{ $errors->first('headline') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.video.fields.headline_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="video_link">{{ trans('cruds.video.fields.video_link') }}</label>
                <input class="form-control {{ $errors->has('video_link') ? 'is-invalid' : '' }}" type="text" name="video_link" id="video_link" value="{{ old('video_link', $video->video_link) }}">
                @if($errors->has('video_link'))
                    <span class="text-danger">{{ $errors->first('video_link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.video.fields.video_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.video.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description', $video->description) !!}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.video.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="company">{{ trans('cruds.video.fields.company') }}</label>
                <input class="form-control {{ $errors->has('company') ? 'is-invalid' : '' }}" type="text" name="company" id="company" value="{{ old('company', $video->company) }}">
                @if($errors->has('company'))
                    <span class="text-danger">{{ $errors->first('company') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.video.fields.company_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="button_text">{{ trans('cruds.video.fields.button_text') }}</label>
                <input class="form-control {{ $errors->has('button_text') ? 'is-invalid' : '' }}" type="text" name="button_text" id="button_text" value="{{ old('button_text', $video->button_text) }}">
                @if($errors->has('button_text'))
                    <span class="text-danger">{{ $errors->first('button_text') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.video.fields.button_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="button_icon_class">{{ trans('cruds.video.fields.button_icon_class') }}</label>
                <input class="form-control {{ $errors->has('button_icon_class') ? 'is-invalid' : '' }}" type="text" name="button_icon_class" id="button_icon_class" value="{{ old('button_icon_class', $video->button_icon_class) }}">
                @if($errors->has('button_icon_class'))
                    <span class="text-danger">{{ $errors->first('button_icon_class') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.video.fields.button_icon_class_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="button_link">{{ trans('cruds.video.fields.button_link') }}</label>
                <input class="form-control {{ $errors->has('button_link') ? 'is-invalid' : '' }}" type="text" name="button_link" id="button_link" value="{{ old('button_link', $video->button_link) }}">
                @if($errors->has('button_link'))
                    <span class="text-danger">{{ $errors->first('button_link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.video.fields.button_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="slug">{{ trans('cruds.video.fields.slug') }}</label>
                <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', $video->slug) }}">
                @if($errors->has('slug'))
                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.video.fields.slug_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="social_channels">{{ trans('cruds.video.fields.social_channels') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('social_channels') ? 'is-invalid' : '' }}" name="social_channels[]" id="social_channels" multiple>
                    @foreach($social_channels as $id => $social_channel)
                        <option value="{{ $id }}" {{ (in_array($id, old('social_channels', [])) || $video->social_channels->contains($id)) ? 'selected' : '' }}>{{ $social_channel }}</option>
                    @endforeach
                </select>
                @if($errors->has('social_channels'))
                    <span class="text-danger">{{ $errors->first('social_channels') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.video.fields.social_channels_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="loading_image">{{ trans('cruds.video.fields.loading_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('loading_image') ? 'is-invalid' : '' }}" id="loading_image-dropzone">
                </div>
                @if($errors->has('loading_image'))
                    <span class="text-danger">{{ $errors->first('loading_image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.video.fields.loading_image_helper') }}</span>
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
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.videos.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $video->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

<script>
    Dropzone.options.loadingImageDropzone = {
    url: '{{ route('admin.videos.storeMedia') }}',
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
@if(isset($video) && $video->loading_image)
      var file = {!! json_encode($video->loading_image) !!}
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