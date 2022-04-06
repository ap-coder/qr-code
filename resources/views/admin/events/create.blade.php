@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.event.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.events.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="form-check {{ $errors->has('active') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="active" value="0">
                    <input class="form-check-input" type="checkbox" name="active" id="active" value="1" {{ old('active', 0) == 1 || old('active') === null ? 'checked' : '' }}>
                    <label class="form-check-label" for="active">{{ trans('cruds.event.fields.active') }}</label>
                </div>
                @if($errors->has('active'))
                    <span class="text-danger">{{ $errors->first('active') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.active_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="design_colors_id">{{ trans('cruds.event.fields.design_colors') }}</label>
                <select class="form-control select2 {{ $errors->has('design_colors') ? 'is-invalid' : '' }}" name="design_colors_id" id="design_colors_id">
                    @foreach($design_colors as $id => $entry)
                        <option value="{{ $id }}" {{ old('design_colors_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('design_colors'))
                    <span class="text-danger">{{ $errors->first('design_colors') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.design_colors_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="qr_name">{{ trans('cruds.event.fields.qr_name') }}</label>
                <input class="form-control {{ $errors->has('qr_name') ? 'is-invalid' : '' }}" type="text" name="qr_name" id="qr_name" value="{{ old('qr_name', '') }}">
                @if($errors->has('qr_name'))
                    <span class="text-danger">{{ $errors->first('qr_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.qr_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="header_image">{{ trans('cruds.event.fields.header_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('header_image') ? 'is-invalid' : '' }}" id="header_image-dropzone">
                </div>
                @if($errors->has('header_image'))
                    <span class="text-danger">{{ $errors->first('header_image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.header_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="organizer">{{ trans('cruds.event.fields.organizer') }}</label>
                <input class="form-control {{ $errors->has('organizer') ? 'is-invalid' : '' }}" type="text" name="organizer" id="organizer" value="{{ old('organizer', '') }}">
                @if($errors->has('organizer'))
                    <span class="text-danger">{{ $errors->first('organizer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.organizer_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.event.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sub_title">{{ trans('cruds.event.fields.sub_title') }}</label>
                <input class="form-control {{ $errors->has('sub_title') ? 'is-invalid' : '' }}" type="text" name="sub_title" id="sub_title" value="{{ old('sub_title', '') }}">
                @if($errors->has('sub_title'))
                    <span class="text-danger">{{ $errors->first('sub_title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.sub_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="summary">{{ trans('cruds.event.fields.summary') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('summary') ? 'is-invalid' : '' }}" name="summary" id="summary">{!! old('summary') !!}</textarea>
                @if($errors->has('summary'))
                    <span class="text-danger">{{ $errors->first('summary') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.summary_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="doortime">{{ trans('cruds.event.fields.doortime') }}</label>
                <input class="form-control timepicker {{ $errors->has('doortime') ? 'is-invalid' : '' }}" type="text" name="doortime" id="doortime" value="{{ old('doortime') }}">
                @if($errors->has('doortime'))
                    <span class="text-danger">{{ $errors->first('doortime') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.doortime_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="event_date_time">{{ trans('cruds.event.fields.event_date_time') }}</label>
                <input class="form-control datetime {{ $errors->has('event_date_time') ? 'is-invalid' : '' }}" type="text" name="event_date_time" id="event_date_time" value="{{ old('event_date_time') }}">
                @if($errors->has('event_date_time'))
                    <span class="text-danger">{{ $errors->first('event_date_time') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.event_date_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="end_date">{{ trans('cruds.event.fields.end_date') }}</label>
                <input class="form-control datetime {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date') }}">
                @if($errors->has('end_date'))
                    <span class="text-danger">{{ $errors->first('end_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.end_date_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('all_day') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="all_day" value="0">
                    <input class="form-check-input" type="checkbox" name="all_day" id="all_day" value="1" {{ old('all_day', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="all_day">{{ trans('cruds.event.fields.all_day') }}</label>
                </div>
                @if($errors->has('all_day'))
                    <span class="text-danger">{{ $errors->first('all_day') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.all_day_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo">{{ trans('cruds.event.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <span class="text-danger">{{ $errors->first('photo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="attachments">{{ trans('cruds.event.fields.attachments') }}</label>
                <div class="needsclick dropzone {{ $errors->has('attachments') ? 'is-invalid' : '' }}" id="attachments-dropzone">
                </div>
                @if($errors->has('attachments'))
                    <span class="text-danger">{{ $errors->first('attachments') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.attachments_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="signup_deadline">{{ trans('cruds.event.fields.signup_deadline') }}</label>
                <input class="form-control date {{ $errors->has('signup_deadline') ? 'is-invalid' : '' }}" type="text" name="signup_deadline" id="signup_deadline" value="{{ old('signup_deadline') }}">
                @if($errors->has('signup_deadline'))
                    <span class="text-danger">{{ $errors->first('signup_deadline') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.signup_deadline_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="link_1">{{ trans('cruds.event.fields.link_1') }}</label>
                <input class="form-control {{ $errors->has('link_1') ? 'is-invalid' : '' }}" type="text" name="link_1" id="link_1" value="{{ old('link_1', '') }}">
                @if($errors->has('link_1'))
                    <span class="text-danger">{{ $errors->first('link_1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.link_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="link_1_text">{{ trans('cruds.event.fields.link_1_text') }}</label>
                <input class="form-control {{ $errors->has('link_1_text') ? 'is-invalid' : '' }}" type="text" name="link_1_text" id="link_1_text" value="{{ old('link_1_text', '') }}">
                @if($errors->has('link_1_text'))
                    <span class="text-danger">{{ $errors->first('link_1_text') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.link_1_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="link_2">{{ trans('cruds.event.fields.link_2') }}</label>
                <input class="form-control {{ $errors->has('link_2') ? 'is-invalid' : '' }}" type="text" name="link_2" id="link_2" value="{{ old('link_2', '') }}">
                @if($errors->has('link_2'))
                    <span class="text-danger">{{ $errors->first('link_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.link_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="link_2_text">{{ trans('cruds.event.fields.link_2_text') }}</label>
                <input class="form-control {{ $errors->has('link_2_text') ? 'is-invalid' : '' }}" type="text" name="link_2_text" id="link_2_text" value="{{ old('link_2_text', '') }}">
                @if($errors->has('link_2_text'))
                    <span class="text-danger">{{ $errors->first('link_2_text') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.link_2_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="button_text">{{ trans('cruds.event.fields.button_text') }}</label>
                <input class="form-control {{ $errors->has('button_text') ? 'is-invalid' : '' }}" type="text" name="button_text" id="button_text" value="{{ old('button_text', '') }}">
                @if($errors->has('button_text'))
                    <span class="text-danger">{{ $errors->first('button_text') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.button_text_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="button_link">{{ trans('cruds.event.fields.button_link') }}</label>
                <input class="form-control {{ $errors->has('button_link') ? 'is-invalid' : '' }}" type="text" name="button_link" id="button_link" value="{{ old('button_link', '') }}">
                @if($errors->has('button_link'))
                    <span class="text-danger">{{ $errors->first('button_link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.button_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="button_icon_class">{{ trans('cruds.event.fields.button_icon_class') }}</label>
                <input class="form-control {{ $errors->has('button_icon_class') ? 'is-invalid' : '' }}" type="text" name="button_icon_class" id="button_icon_class" value="{{ old('button_icon_class', '') }}">
                @if($errors->has('button_icon_class'))
                    <span class="text-danger">{{ $errors->first('button_icon_class') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.button_icon_class_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="venue_name">{{ trans('cruds.event.fields.venue_name') }}</label>
                <input class="form-control {{ $errors->has('venue_name') ? 'is-invalid' : '' }}" type="text" name="venue_name" id="venue_name" value="{{ old('venue_name', '') }}">
                @if($errors->has('venue_name'))
                    <span class="text-danger">{{ $errors->first('venue_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.venue_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="venue_address_id">{{ trans('cruds.event.fields.venue_address') }}</label>
                <select class="form-control select2 {{ $errors->has('venue_address') ? 'is-invalid' : '' }}" name="venue_address_id" id="venue_address_id">
                    @foreach($venue_addresses as $id => $entry)
                        <option value="{{ $id }}" {{ old('venue_address_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('venue_address'))
                    <span class="text-danger">{{ $errors->first('venue_address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.venue_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="about">{{ trans('cruds.event.fields.about') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('about') ? 'is-invalid' : '' }}" name="about" id="about">{!! old('about') !!}</textarea>
                @if($errors->has('about'))
                    <span class="text-danger">{{ $errors->first('about') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.about_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="contact">{{ trans('cruds.event.fields.contact') }}</label>
                <input class="form-control {{ $errors->has('contact') ? 'is-invalid' : '' }}" type="text" name="contact" id="contact" value="{{ old('contact', '') }}">
                @if($errors->has('contact'))
                    <span class="text-danger">{{ $errors->first('contact') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.contact_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.event.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}">
                @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.event.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}">
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="website">{{ trans('cruds.event.fields.website') }}</label>
                <input class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}" type="text" name="website" id="website" value="{{ old('website', '') }}">
                @if($errors->has('website'))
                    <span class="text-danger">{{ $errors->first('website') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.website_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="loading_image">{{ trans('cruds.event.fields.loading_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('loading_image') ? 'is-invalid' : '' }}" id="loading_image-dropzone">
                </div>
                @if($errors->has('loading_image'))
                    <span class="text-danger">{{ $errors->first('loading_image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.loading_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="slug">{{ trans('cruds.event.fields.slug') }}</label>
                <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', '') }}">
                @if($errors->has('slug'))
                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.slug_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.event.fields.notes') }}</label>
                <textarea class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{{ old('notes') }}</textarea>
                @if($errors->has('notes'))
                    <span class="text-danger">{{ $errors->first('notes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('add_share_button') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="add_share_button" value="0">
                    <input class="form-check-input" type="checkbox" name="add_share_button" id="add_share_button" value="1" {{ old('add_share_button', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="add_share_button">{{ trans('cruds.event.fields.add_share_button') }}</label>
                </div>
                @if($errors->has('add_share_button'))
                    <span class="text-danger">{{ $errors->first('add_share_button') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.add_share_button_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="created_by_id">{{ trans('cruds.event.fields.created_by') }}</label>
                <select class="form-control select2 {{ $errors->has('created_by') ? 'is-invalid' : '' }}" name="created_by_id" id="created_by_id">
                    @foreach($created_bies as $id => $entry)
                        <option value="{{ $id }}" {{ old('created_by_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('created_by'))
                    <span class="text-danger">{{ $errors->first('created_by') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.created_by_helper') }}</span>
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
    url: '{{ route('admin.events.storeMedia') }}',
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
@if(isset($event) && $event->header_image)
      var file = {!! json_encode($event->header_image) !!}
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
                xhr.open('POST', '{{ route('admin.events.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $event->id ?? 0 }}');
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
    var uploadedPhotoMap = {}
Dropzone.options.photoDropzone = {
    url: '{{ route('admin.events.storeMedia') }}',
    maxFilesize: 10, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10,
      width: 800,
      height: 800
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="photo[]" value="' + response.name + '">')
      uploadedPhotoMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPhotoMap[file.name]
      }
      $('form').find('input[name="photo[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($event) && $event->photo)
      var files = {!! json_encode($event->photo) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="photo[]" value="' + file.file_name + '">')
        }
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
    var uploadedAttachmentsMap = {}
Dropzone.options.attachmentsDropzone = {
    url: '{{ route('admin.events.storeMedia') }}',
    maxFilesize: 10, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="attachments[]" value="' + response.name + '">')
      uploadedAttachmentsMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedAttachmentsMap[file.name]
      }
      $('form').find('input[name="attachments[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($event) && $event->attachments)
          var files =
            {!! json_encode($event->attachments) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="attachments[]" value="' + file.file_name + '">')
            }
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
    url: '{{ route('admin.events.storeMedia') }}',
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
@if(isset($event) && $event->loading_image)
      var file = {!! json_encode($event->loading_image) !!}
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