@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.qrColor.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.qr-colors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.qrColor.fields.id') }}
                        </th>
                        <td>
                            {{ $qrColor->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qrColor.fields.color') }}
                        </th>
                        <td>
                            {{ $qrColor->color }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qrColor.fields.corner_inner') }}
                        </th>
                        <td>
                            {{ $qrColor->corner_inner }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qrColor.fields.corner_outer') }}
                        </th>
                        <td>
                            {{ $qrColor->corner_outer }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.qr-colors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection