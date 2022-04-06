@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.event.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.events.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.id') }}
                        </th>
                        <td>
                            {{ $event->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.qr_name') }}
                        </th>
                        <td>
                            {{ $event->qr_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.published') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $event->published ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.header_image') }}
                        </th>
                        <td>
                            @if($event->header_image)
                                <a href="{{ $event->header_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $event->header_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.organizer') }}
                        </th>
                        <td>
                            {{ $event->organizer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.title') }}
                        </th>
                        <td>
                            {{ $event->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.sub_title') }}
                        </th>
                        <td>
                            {{ $event->sub_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.summary') }}
                        </th>
                        <td>
                            {!! $event->summary !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.doortime') }}
                        </th>
                        <td>
                            {{ $event->doortime }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.event_date_time') }}
                        </th>
                        <td>
                            {{ $event->event_date_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.end_date') }}
                        </th>
                        <td>
                            {{ $event->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.all_day') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $event->all_day ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.photo') }}
                        </th>
                        <td>
                            @foreach($event->photo as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.attachments') }}
                        </th>
                        <td>
                            @foreach($event->attachments as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.signup_deadline') }}
                        </th>
                        <td>
                            {{ $event->signup_deadline }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.link_1') }}
                        </th>
                        <td>
                            {{ $event->link_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.link_1_text') }}
                        </th>
                        <td>
                            {{ $event->link_1_text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.link_2') }}
                        </th>
                        <td>
                            {{ $event->link_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.link_2_text') }}
                        </th>
                        <td>
                            {{ $event->link_2_text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.button_text') }}
                        </th>
                        <td>
                            {{ $event->button_text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.button_link') }}
                        </th>
                        <td>
                            {{ $event->button_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.button_icon_class') }}
                        </th>
                        <td>
                            {{ $event->button_icon_class }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.venue_name') }}
                        </th>
                        <td>
                            {{ $event->venue_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.about') }}
                        </th>
                        <td>
                            {!! $event->about !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.contact') }}
                        </th>
                        <td>
                            {{ $event->contact }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.phone') }}
                        </th>
                        <td>
                            {{ $event->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.email') }}
                        </th>
                        <td>
                            {{ $event->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.website') }}
                        </th>
                        <td>
                            {{ $event->website }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.loading_image') }}
                        </th>
                        <td>
                            @if($event->loading_image)
                                <a href="{{ $event->loading_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $event->loading_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.slug') }}
                        </th>
                        <td>
                            {{ $event->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.notes') }}
                        </th>
                        <td>
                            {{ $event->notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.add_share_button') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $event->add_share_button ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.event.fields.created_by') }}
                        </th>
                        <td>
                            {{ $event->created_by->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.events.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection