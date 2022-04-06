@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.hour.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.hours.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.hour.fields.id') }}
                        </th>
                        <td>
                            {{ $hour->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hour.fields.day') }}
                        </th>
                        <td>
                            {{ App\Models\Hour::DAY_SELECT[$hour->day] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hour.fields.open_time') }}
                        </th>
                        <td>
                            {{ $hour->open_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hour.fields.closing_time') }}
                        </th>
                        <td>
                            {{ $hour->closing_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hour.fields.time_of_day') }}
                        </th>
                        <td>
                            {{ App\Models\Hour::TIME_OF_DAY_SELECT[$hour->time_of_day] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.hours.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection