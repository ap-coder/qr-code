@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.vcard.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vcards.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.vcard.fields.id') }}
                        </th>
                        <td>
                            {{ $vcard->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vcard.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $vcard->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vcard.fields.qr_name') }}
                        </th>
                        <td>
                            {{ $vcard->qr_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vcard.fields.first_name') }}
                        </th>
                        <td>
                            {{ $vcard->first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vcard.fields.last_name') }}
                        </th>
                        <td>
                            {{ $vcard->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vcard.fields.title') }}
                        </th>
                        <td>
                            {{ $vcard->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vcard.fields.summary') }}
                        </th>
                        <td>
                            {!! $vcard->summary !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vcard.fields.photo') }}
                        </th>
                        <td>
                            @if($vcard->photo)
                                <a href="{{ $vcard->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $vcard->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vcard.fields.company') }}
                        </th>
                        <td>
                            {{ $vcard->company }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vcard.fields.headline') }}
                        </th>
                        <td>
                            {{ $vcard->headline }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vcard.fields.button_text') }}
                        </th>
                        <td>
                            {{ $vcard->button_text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vcard.fields.button_lnk') }}
                        </th>
                        <td>
                            {{ $vcard->button_lnk }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vcard.fields.about') }}
                        </th>
                        <td>
                            {!! $vcard->about !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vcard.fields.email') }}
                        </th>
                        <td>
                            {{ $vcard->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vcard.fields.website_link') }}
                        </th>
                        <td>
                            {{ $vcard->website_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vcard.fields.home_phone') }}
                        </th>
                        <td>
                            {{ $vcard->home_phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vcard.fields.mobile_number') }}
                        </th>
                        <td>
                            {{ $vcard->mobile_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vcard.fields.fax_number') }}
                        </th>
                        <td>
                            {{ $vcard->fax_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vcard.fields.loading_photo') }}
                        </th>
                        <td>
                            @if($vcard->loading_photo)
                                <a href="{{ $vcard->loading_photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $vcard->loading_photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vcard.fields.hours') }}
                        </th>
                        <td>
                            @foreach($vcard->hours as $key => $hours)
                                <span class="label label-info">{{ $hours->day }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vcard.fields.slug') }}
                        </th>
                        <td>
                            {{ $vcard->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.vcard.fields.created_by') }}
                        </th>
                        <td>
                            {{ $vcard->created_by->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.vcards.index') }}">
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
            <a class="nav-link" href="#vcards_qr_codes" role="tab" data-toggle="tab">
                {{ trans('cruds.qrCode.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="vcards_qr_codes">
            @includeIf('admin.vcards.relationships.vcardsQrCodes', ['qrCodes' => $vcard->vcardsQrCodes])
        </div>
    </div>
</div>

@endsection