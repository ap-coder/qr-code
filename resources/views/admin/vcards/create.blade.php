@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.vcard.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.vcards.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="form-check {{ $errors->has('active') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="active" value="0">
                    <input class="form-check-input" type="checkbox" name="active" id="active" value="1" {{ old('active', 0) == 1 || old('active') === null ? 'checked' : '' }}>
                    <label class="form-check-label" for="active">{{ trans('cruds.vcard.fields.active') }}</label>
                </div>
                @if($errors->has('active'))
                    <span class="text-danger">{{ $errors->first('active') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vcard.fields.active_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="qr_name">{{ trans('cruds.vcard.fields.qr_name') }}</label>
                <input class="form-control {{ $errors->has('qr_name') ? 'is-invalid' : '' }}" type="text" name="qr_name" id="qr_name" value="{{ old('qr_name', '') }}">
                @if($errors->has('qr_name'))
                    <span class="text-danger">{{ $errors->first('qr_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vcard.fields.qr_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="first_name">{{ trans('cruds.vcard.fields.first_name') }}</label>
                <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ old('first_name', '') }}">
                @if($errors->has('first_name'))
                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vcard.fields.first_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="last_name">{{ trans('cruds.vcard.fields.last_name') }}</label>
                <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" id="last_name" value="{{ old('last_name', '') }}">
                @if($errors->has('last_name'))
                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vcard.fields.last_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title">{{ trans('cruds.vcard.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}">
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vcard.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="summary">{{ trans('cruds.vcard.fields.summary') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('summary') ? 'is-invalid' : '' }}" name="summary" id="summary">{!! old('summary') !!}</textarea>
                @if($errors->has('summary'))
                    <span class="text-danger">{{ $errors->first('summary') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vcard.fields.summary_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo">{{ trans('cruds.vcard.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <span class="text-danger">{{ $errors->first('photo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vcard.fields.photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="company">{{ trans('cruds.vcard.fields.company') }}</label>
                <input class="form-control {{ $errors->has('company') ? 'is-invalid' : '' }}" type="text" name="company" id="company" value="{{ old('company', '') }}">
                @if($errors->has('company'))
                    <span class="text-danger">{{ $errors->first('company') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vcard.fields.company_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="headline">{{ trans('cruds.vcard.fields.headline') }}</label>
                <input class="form-control {{ $errors->has('headline') ? 'is-invalid' : '' }}" type="text" name="headline" id="headline" value="{{ old('headline', '') }}">
                @if($errors->has('headline'))
                    <span class="text-danger">{{ $errors->first('headline') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vcard.fields.headline_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="button_text">{{ trans('cruds.vcard.fields.button_text') }}</label>
                <input class="form-control {{ $errors->has('button_text') ? 'is-invalid' : '' }}" type="text" name="button_text" id="button_text" value="{{ old('button_text', '') }}">
                @if($errors->has('button_text'))
                    <span class="text-danger">{{ $errors->first('button_text') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vcard.fields.button_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="button_lnk">{{ trans('cruds.vcard.fields.button_lnk') }}</label>
                <input class="form-control {{ $errors->has('button_lnk') ? 'is-invalid' : '' }}" type="text" name="button_lnk" id="button_lnk" value="{{ old('button_lnk', '') }}">
                @if($errors->has('button_lnk'))
                    <span class="text-danger">{{ $errors->first('button_lnk') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vcard.fields.button_lnk_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="about">{{ trans('cruds.vcard.fields.about') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('about') ? 'is-invalid' : '' }}" name="about" id="about">{!! old('about') !!}</textarea>
                @if($errors->has('about'))
                    <span class="text-danger">{{ $errors->first('about') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vcard.fields.about_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.vcard.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}">
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vcard.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="website_link">{{ trans('cruds.vcard.fields.website_link') }}</label>
                <input class="form-control {{ $errors->has('website_link') ? 'is-invalid' : '' }}" type="text" name="website_link" id="website_link" value="{{ old('website_link', '') }}">
                @if($errors->has('website_link'))
                    <span class="text-danger">{{ $errors->first('website_link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vcard.fields.website_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="home_phone">{{ trans('cruds.vcard.fields.home_phone') }}</label>
                <input class="form-control {{ $errors->has('home_phone') ? 'is-invalid' : '' }}" type="text" name="home_phone" id="home_phone" value="{{ old('home_phone', '') }}">
                @if($errors->has('home_phone'))
                    <span class="text-danger">{{ $errors->first('home_phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vcard.fields.home_phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mobile_number">{{ trans('cruds.vcard.fields.mobile_number') }}</label>
                <input class="form-control {{ $errors->has('mobile_number') ? 'is-invalid' : '' }}" type="text" name="mobile_number" id="mobile_number" value="{{ old('mobile_number', '') }}">
                @if($errors->has('mobile_number'))
                    <span class="text-danger">{{ $errors->first('mobile_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vcard.fields.mobile_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fax_number">{{ trans('cruds.vcard.fields.fax_number') }}</label>
                <input class="form-control {{ $errors->has('fax_number') ? 'is-invalid' : '' }}" type="text" name="fax_number" id="fax_number" value="{{ old('fax_number', '') }}">
                @if($errors->has('fax_number'))
                    <span class="text-danger">{{ $errors->first('fax_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vcard.fields.fax_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="loading_photo">{{ trans('cruds.vcard.fields.loading_photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('loading_photo') ? 'is-invalid' : '' }}" id="loading_photo-dropzone">
                </div>
                @if($errors->has('loading_photo'))
                    <span class="text-danger">{{ $errors->first('loading_photo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vcard.fields.loading_photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hours">{{ trans('cruds.vcard.fields.hours') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('hours') ? 'is-invalid' : '' }}" name="hours[]" id="hours" multiple>
                    @foreach($hours as $id => $hour)
                        <option value="{{ $id }}" {{ in_array($id, old('hours', [])) ? 'selected' : '' }}>{{ $hour }}</option>
                    @endforeach
                </select>
                @if($errors->has('hours'))
                    <span class="text-danger">{{ $errors->first('hours') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vcard.fields.hours_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="slug">{{ trans('cruds.vcard.fields.slug') }}</label>
                <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', '') }}">
                @if($errors->has('slug'))
                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vcard.fields.slug_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="created_by_id">{{ trans('cruds.vcard.fields.created_by') }}</label>
                <select class="form-control select2 {{ $errors->has('created_by') ? 'is-invalid' : '' }}" name="created_by_id" id="created_by_id">
                    @foreach($created_bies as $id => $entry)
                        <option value="{{ $id }}" {{ old('created_by_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('created_by'))
                    <span class="text-danger">{{ $errors->first('created_by') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.vcard.fields.created_by_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.vcards.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $vcard->id ?? 0 }}');
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
    Dropzone.options.photoDropzone = {
    url: '{{ route('admin.vcards.storeMedia') }}',
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
      height: 400
    },
    success: function (file, response) {
      $('form').find('input[name="photo"]').remove()
      $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($vcard) && $vcard->photo)
      var file = {!! json_encode($vcard->photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
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
    Dropzone.options.loadingPhotoDropzone = {
    url: '{{ route('admin.vcards.storeMedia') }}',
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
      $('form').find('input[name="loading_photo"]').remove()
      $('form').append('<input type="hidden" name="loading_photo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="loading_photo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($vcard) && $vcard->loading_photo)
      var file = {!! json_encode($vcard->loading_photo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="loading_photo" value="' + file.file_name + '">')
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