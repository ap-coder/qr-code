@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.businessPage.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.business-pages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPage.fields.id') }}
                        </th>
                        <td>
                            {{ $businessPage->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPage.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $businessPage->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPage.fields.qr_name') }}
                        </th>
                        <td>
                            {{ $businessPage->qr_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPage.fields.company') }}
                        </th>
                        <td>
                            {{ $businessPage->company }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPage.fields.headline') }}
                        </th>
                        <td>
                            {{ $businessPage->headline }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPage.fields.summary') }}
                        </th>
                        <td>
                            {!! $businessPage->summary !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPage.fields.button_text') }}
                        </th>
                        <td>
                            {{ $businessPage->button_text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPage.fields.button_lnk') }}
                        </th>
                        <td>
                            {{ $businessPage->button_lnk }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPage.fields.about') }}
                        </th>
                        <td>
                            {!! $businessPage->about !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPage.fields.contact_name') }}
                        </th>
                        <td>
                            {{ $businessPage->contact_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPage.fields.phone') }}
                        </th>
                        <td>
                            {{ $businessPage->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPage.fields.email') }}
                        </th>
                        <td>
                            {{ $businessPage->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPage.fields.website_link') }}
                        </th>
                        <td>
                            {{ $businessPage->website_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPage.fields.header_image') }}
                        </th>
                        <td>
                            @if($businessPage->header_image)
                                <a href="{{ $businessPage->header_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $businessPage->header_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPage.fields.loading_image') }}
                        </th>
                        <td>
                            @if($businessPage->loading_image)
                                <a href="{{ $businessPage->loading_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $businessPage->loading_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPage.fields.slug') }}
                        </th>
                        <td>
                            {{ $businessPage->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPage.fields.hours') }}
                        </th>
                        <td>
                            @foreach($businessPage->hours as $key => $hours)
                                <span class="label label-info">{{ $hours->day }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPage.fields.created_by') }}
                        </th>
                        <td>
                            {{ $businessPage->created_by->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.business-pages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#business_pages_qr_codes" role="tab" data-toggle="tab">
                {{ trans('cruds.qrCode.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="business_pages_qr_codes">
            @includeIf('admin.businessPages.relationships.businessPagesQrCodes', ['qrCodes' => $businessPage->businessPagesQrCodes])
        </div>
    </div>
</div>

@endsection