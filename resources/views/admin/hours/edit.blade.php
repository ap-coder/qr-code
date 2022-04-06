@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.hour.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.hours.update", [$hour->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label>{{ trans('cruds.hour.fields.day') }}</label>
                <select class="form-control {{ $errors->has('day') ? 'is-invalid' : '' }}" name="day" id="day">
                    <option value disabled {{ old('day', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Hour::DAY_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('day', $hour->day) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('day'))
                    <span class="text-danger">{{ $errors->first('day') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hour.fields.day_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="open_time">{{ trans('cruds.hour.fields.open_time') }}</label>
                <input class="form-control timepicker {{ $errors->has('open_time') ? 'is-invalid' : '' }}" type="text" name="open_time" id="open_time" value="{{ old('open_time', $hour->open_time) }}">
                @if($errors->has('open_time'))
                    <span class="text-danger">{{ $errors->first('open_time') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hour.fields.open_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="closing_time">{{ trans('cruds.hour.fields.closing_time') }}</label>
                <input class="form-control timepicker {{ $errors->has('closing_time') ? 'is-invalid' : '' }}" type="text" name="closing_time" id="closing_time" value="{{ old('closing_time', $hour->closing_time) }}">
                @if($errors->has('closing_time'))
                    <span class="text-danger">{{ $errors->first('closing_time') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hour.fields.closing_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.hour.fields.time_of_day') }}</label>
                <select class="form-control {{ $errors->has('time_of_day') ? 'is-invalid' : '' }}" name="time_of_day" id="time_of_day">
                    <option value disabled {{ old('time_of_day', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Hour::TIME_OF_DAY_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('time_of_day', $hour->time_of_day) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('time_of_day'))
                    <span class="text-danger">{{ $errors->first('time_of_day') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.hour.fields.time_of_day_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection