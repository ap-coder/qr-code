@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.qrCode.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.qr-codes.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.qrCode.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.qrCode.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.qrCode.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description') !!}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.qrCode.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('published') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="published" value="0">
                    <input class="form-check-input" type="checkbox" name="published" id="published" value="1" {{ old('published', 0) == 1 || old('published') === null ? 'checked' : '' }}>
                    <label class="form-check-label" for="published">{{ trans('cruds.qrCode.fields.published') }}</label>
                </div>
                @if($errors->has('published'))
                    <span class="text-danger">{{ $errors->first('published') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.qrCode.fields.published_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="slug">{{ trans('cruds.qrCode.fields.slug') }}</label>
                <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', '') }}">
                @if($errors->has('slug'))
                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.qrCode.fields.slug_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="scans">{{ trans('cruds.qrCode.fields.scans') }}</label>
                <input class="form-control {{ $errors->has('scans') ? 'is-invalid' : '' }}" type="number" name="scans" id="scans" value="{{ old('scans', '0') }}" step="1">
                @if($errors->has('scans'))
                    <span class="text-danger">{{ $errors->first('scans') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.qrCode.fields.scans_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="clicks">{{ trans('cruds.qrCode.fields.clicks') }}</label>
                <input class="form-control {{ $errors->has('clicks') ? 'is-invalid' : '' }}" type="number" name="clicks" id="clicks" value="{{ old('clicks', '0') }}" step="1">
                @if($errors->has('clicks'))
                    <span class="text-danger">{{ $errors->first('clicks') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.qrCode.fields.clicks_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="short_link">{{ trans('cruds.qrCode.fields.short_link') }}</label>
                <input class="form-control {{ $errors->has('short_link') ? 'is-invalid' : '' }}" type="text" name="short_link" id="short_link" value="{{ old('short_link', '') }}">
                @if($errors->has('short_link'))
                    <span class="text-danger">{{ $errors->first('short_link') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.qrCode.fields.short_link_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('active') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="active" value="0">
                    <input class="form-check-input" type="checkbox" name="active" id="active" value="1" {{ old('active', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="active">{{ trans('cruds.qrCode.fields.active') }}</label>
                </div>
                @if($errors->has('active'))
                    <span class="text-danger">{{ $errors->first('active') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.qrCode.fields.active_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('pause') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="pause" value="0">
                    <input class="form-check-input" type="checkbox" name="pause" id="pause" value="1" {{ old('pause', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="pause">{{ trans('cruds.qrCode.fields.pause') }}</label>
                </div>
                @if($errors->has('pause'))
                    <span class="text-danger">{{ $errors->first('pause') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.qrCode.fields.pause_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="types">{{ trans('cruds.qrCode.fields.types') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('types') ? 'is-invalid' : '' }}" name="types[]" id="types" multiple>
                    @foreach($types as $id => $type)
                        <option value="{{ $id }}" {{ in_array($id, old('types', [])) ? 'selected' : '' }}>{{ $type }}</option>
                    @endforeach
                </select>
                @if($errors->has('types'))
                    <span class="text-danger">{{ $errors->first('types') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.qrCode.fields.types_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vcards">{{ trans('cruds.qrCode.fields.vcards') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('vcards') ? 'is-invalid' : '' }}" name="vcards[]" id="vcards" multiple>
                    @foreach($vcards as $id => $vcard)
                        <option value="{{ $id }}" {{ in_array($id, old('vcards', [])) ? 'selected' : '' }}>{{ $vcard }}</option>
                    @endforeach
                </select>
                @if($errors->has('vcards'))
                    <span class="text-danger">{{ $errors->first('vcards') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.qrCode.fields.vcards_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="websites">{{ trans('cruds.qrCode.fields.websites') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('websites') ? 'is-invalid' : '' }}" name="websites[]" id="websites" multiple>
                    @foreach($websites as $id => $website)
                        <option value="{{ $id }}" {{ in_array($id, old('websites', [])) ? 'selected' : '' }}>{{ $website }}</option>
                    @endforeach
                </select>
                @if($errors->has('websites'))
                    <span class="text-danger">{{ $errors->first('websites') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.qrCode.fields.websites_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="business_pages">{{ trans('cruds.qrCode.fields.business_pages') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('business_pages') ? 'is-invalid' : '' }}" name="business_pages[]" id="business_pages" multiple>
                    @foreach($business_pages as $id => $business_page)
                        <option value="{{ $id }}" {{ in_array($id, old('business_pages', [])) ? 'selected' : '' }}>{{ $business_page }}</option>
                    @endforeach
                </select>
                @if($errors->has('business_pages'))
                    <span class="text-danger">{{ $errors->first('business_pages') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.qrCode.fields.business_pages_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.qr-codes.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $qrCode->id ?? 0 }}');
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

@endsection