@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.imageGallery.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.image-galleries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.imageGallery.fields.id') }}
                        </th>
                        <td>
                            {{ $imageGallery->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.imageGallery.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $imageGallery->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.imageGallery.fields.qr_name') }}
                        </th>
                        <td>
                            {{ $imageGallery->qr_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.imageGallery.fields.images') }}
                        </th>
                        <td>
                            @foreach($imageGallery->images as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.imageGallery.fields.title') }}
                        </th>
                        <td>
                            {{ $imageGallery->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.imageGallery.fields.description') }}
                        </th>
                        <td>
                            {{ $imageGallery->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.imageGallery.fields.website') }}
                        </th>
                        <td>
                            {{ $imageGallery->website }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.imageGallery.fields.button_text') }}
                        </th>
                        <td>
                            {{ $imageGallery->button_text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.imageGallery.fields.button_icon_class') }}
                        </th>
                        <td>
                            {{ $imageGallery->button_icon_class }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.imageGallery.fields.button_link') }}
                        </th>
                        <td>
                            {{ $imageGallery->button_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.imageGallery.fields.loading_image') }}
                        </th>
                        <td>
                            @if($imageGallery->loading_image)
                                <a href="{{ $imageGallery->loading_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $imageGallery->loading_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.imageGallery.fields.slug') }}
                        </th>
                        <td>
                            {{ $imageGallery->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.imageGallery.fields.created_by') }}
                        </th>
                        <td>
                            {{ $imageGallery->created_by->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.image-galleries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection