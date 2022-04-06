@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.download.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.downloads.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.download.fields.id') }}
                        </th>
                        <td>
                            {{ $download->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.download.fields.frame') }}
                        </th>
                        <td>
                            {{ App\Models\Download::FRAME_SELECT[$download->frame] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.download.fields.frame_color') }}
                        </th>
                        <td>
                            {{ $download->frame_color }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.download.fields.frame_text') }}
                        </th>
                        <td>
                            {{ $download->frame_text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.download.fields.logo') }}
                        </th>
                        <td>
                            @if($download->logo)
                                <a href="{{ $download->logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $download->logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.download.fields.code') }}
                        </th>
                        <td>
                            {{ App\Models\Download::CODE_SELECT[$download->code] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.download.fields.qr_color') }}
                        </th>
                        <td>
                            {{ $download->qr_color->color ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.downloads.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection