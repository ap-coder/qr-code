@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.qrCode.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.qr-codes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.qrCode.fields.id') }}
                        </th>
                        <td>
                            {{ $qrCode->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qrCode.fields.name') }}
                        </th>
                        <td>
                            {{ $qrCode->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qrCode.fields.description') }}
                        </th>
                        <td>
                            {!! $qrCode->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qrCode.fields.published') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $qrCode->published ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qrCode.fields.slug') }}
                        </th>
                        <td>
                            {{ $qrCode->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qrCode.fields.scans') }}
                        </th>
                        <td>
                            {{ $qrCode->scans }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qrCode.fields.clicks') }}
                        </th>
                        <td>
                            {{ $qrCode->clicks }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qrCode.fields.short_link') }}
                        </th>
                        <td>
                            {{ $qrCode->short_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qrCode.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $qrCode->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qrCode.fields.pause') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $qrCode->pause ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qrCode.fields.types') }}
                        </th>
                        <td>
                            @foreach($qrCode->types as $key => $types)
                                <span class="label label-info">{{ $types->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qrCode.fields.vcards') }}
                        </th>
                        <td>
                            @foreach($qrCode->vcards as $key => $vcards)
                                <span class="label label-info">{{ $vcards->qr_name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qrCode.fields.websites') }}
                        </th>
                        <td>
                            @foreach($qrCode->websites as $key => $websites)
                                <span class="label label-info">{{ $websites->qr_name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qrCode.fields.business_pages') }}
                        </th>
                        <td>
                            @foreach($qrCode->business_pages as $key => $business_pages)
                                <span class="label label-info">{{ $business_pages->qr_name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.qr-codes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection