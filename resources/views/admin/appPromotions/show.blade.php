@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.appPromotion.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.app-promotions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.appPromotion.fields.id') }}
                        </th>
                        <td>
                            {{ $appPromotion->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appPromotion.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $appPromotion->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appPromotion.fields.qr_name') }}
                        </th>
                        <td>
                            {{ $appPromotion->qr_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appPromotion.fields.colors') }}
                        </th>
                        <td>
                            {{ $appPromotion->colors->primary ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appPromotion.fields.app_name') }}
                        </th>
                        <td>
                            {{ $appPromotion->app_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appPromotion.fields.developer') }}
                        </th>
                        <td>
                            {{ $appPromotion->developer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appPromotion.fields.app_logo') }}
                        </th>
                        <td>
                            @if($appPromotion->app_logo)
                                <a href="{{ $appPromotion->app_logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $appPromotion->app_logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appPromotion.fields.title') }}
                        </th>
                        <td>
                            {{ $appPromotion->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appPromotion.fields.description') }}
                        </th>
                        <td>
                            {{ $appPromotion->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appPromotion.fields.website') }}
                        </th>
                        <td>
                            {{ $appPromotion->website }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appPromotion.fields.button_text') }}
                        </th>
                        <td>
                            {{ $appPromotion->button_text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appPromotion.fields.button_link') }}
                        </th>
                        <td>
                            {{ $appPromotion->button_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appPromotion.fields.button_icon_class') }}
                        </th>
                        <td>
                            {{ $appPromotion->button_icon_class }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appPromotion.fields.apple_store_link') }}
                        </th>
                        <td>
                            {{ $appPromotion->apple_store_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appPromotion.fields.google_play_link') }}
                        </th>
                        <td>
                            {{ $appPromotion->google_play_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appPromotion.fields.amazon_app_link') }}
                        </th>
                        <td>
                            {{ $appPromotion->amazon_app_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appPromotion.fields.loading_image') }}
                        </th>
                        <td>
                            @if($appPromotion->loading_image)
                                <a href="{{ $appPromotion->loading_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $appPromotion->loading_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.appPromotion.fields.created_by') }}
                        </th>
                        <td>
                            {{ $appPromotion->created_by->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.app-promotions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection