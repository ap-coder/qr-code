@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.designColor.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.design-colors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.designColor.fields.id') }}
                        </th>
                        <td>
                            {{ $designColor->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.designColor.fields.primary') }}
                        </th>
                        <td>
                            {{ $designColor->primary }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.designColor.fields.button') }}
                        </th>
                        <td>
                            {{ $designColor->button }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.designColor.fields.secondary') }}
                        </th>
                        <td>
                            {{ $designColor->secondary }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.designColor.fields.gradient') }}
                        </th>
                        <td>
                            {{ $designColor->gradient }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.designColor.fields.custom_color') }}
                        </th>
                        <td>
                            {{ $designColor->custom_color }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.designColor.fields.custom_button') }}
                        </th>
                        <td>
                            {{ $designColor->custom_button }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.design-colors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection