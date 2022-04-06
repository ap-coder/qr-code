@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.website.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.websites.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.website.fields.id') }}
                        </th>
                        <td>
                            {{ $website->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.website.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $website->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.website.fields.qr_name') }}
                        </th>
                        <td>
                            {{ $website->qr_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.website.fields.website_name') }}
                        </th>
                        <td>
                            {{ $website->website_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.website.fields.url') }}
                        </th>
                        <td>
                            {{ $website->url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.website.fields.slug') }}
                        </th>
                        <td>
                            {{ $website->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.website.fields.created_by') }}
                        </th>
                        <td>
                            {{ $website->created_by->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.websites.index') }}">
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
            <a class="nav-link" href="#websites_qr_codes" role="tab" data-toggle="tab">
                {{ trans('cruds.qrCode.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="websites_qr_codes">
            @includeIf('admin.websites.relationships.websitesQrCodes', ['qrCodes' => $website->websitesQrCodes])
        </div>
    </div>
</div>

@endsection