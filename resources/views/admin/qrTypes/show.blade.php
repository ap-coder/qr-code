@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.qrType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.qr-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.qrType.fields.id') }}
                        </th>
                        <td>
                            {{ $qrType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qrType.fields.published') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $qrType->published ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qrType.fields.title') }}
                        </th>
                        <td>
                            {{ $qrType->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qrType.fields.subtitle') }}
                        </th>
                        <td>
                            {{ $qrType->subtitle }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qrType.fields.mock_image') }}
                        </th>
                        <td>
                            @if($qrType->mock_image)
                                <a href="{{ $qrType->mock_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $qrType->mock_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qrType.fields.hover_over_image') }}
                        </th>
                        <td>
                            @if($qrType->hover_over_image)
                                <a href="{{ $qrType->hover_over_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $qrType->hover_over_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qrType.fields.select_type') }}
                        </th>
                        <td>
                            {{ App\Models\QrType::SELECT_TYPE_SELECT[$qrType->select_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qrType.fields.industries') }}
                        </th>
                        <td>
                            @foreach($qrType->industries as $key => $industries)
                                <span class="label label-info">{{ $industries->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qrType.fields.icon_class') }}
                        </th>
                        <td>
                            {{ $qrType->icon_class }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.qr-types.index') }}">
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
            <a class="nav-link" href="#types_qr_codes" role="tab" data-toggle="tab">
                {{ trans('cruds.qrCode.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="types_qr_codes">
            @includeIf('admin.qrTypes.relationships.typesQrCodes', ['qrCodes' => $qrType->typesQrCodes])
        </div>
    </div>
</div>

@endsection