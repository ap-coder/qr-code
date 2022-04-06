@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.qrIndustry.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.qr-industries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.qrIndustry.fields.id') }}
                        </th>
                        <td>
                            {{ $qrIndustry->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qrIndustry.fields.name') }}
                        </th>
                        <td>
                            {{ $qrIndustry->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qrIndustry.fields.description') }}
                        </th>
                        <td>
                            {{ $qrIndustry->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.qr-industries.index') }}">
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
            <a class="nav-link" href="#industries_qr_types" role="tab" data-toggle="tab">
                {{ trans('cruds.qrType.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="industries_qr_types">
            @includeIf('admin.qrIndustries.relationships.industriesQrTypes', ['qrTypes' => $qrIndustry->industriesQrTypes])
        </div>
    </div>
</div>

@endsection