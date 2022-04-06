@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pdf.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pdfs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pdf.fields.id') }}
                        </th>
                        <td>
                            {{ $pdf->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pdf.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $pdf->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pdf.fields.qr_name') }}
                        </th>
                        <td>
                            {{ $pdf->qr_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pdf.fields.pdf') }}
                        </th>
                        <td>
                            @if($pdf->pdf)
                                <a href="{{ $pdf->pdf->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pdf.fields.company') }}
                        </th>
                        <td>
                            {{ $pdf->company }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pdf.fields.title') }}
                        </th>
                        <td>
                            {{ $pdf->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pdf.fields.description') }}
                        </th>
                        <td>
                            {{ $pdf->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pdf.fields.website') }}
                        </th>
                        <td>
                            {{ $pdf->website }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pdf.fields.loading_image') }}
                        </th>
                        <td>
                            @if($pdf->loading_image)
                                <a href="{{ $pdf->loading_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $pdf->loading_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pdf.fields.slug') }}
                        </th>
                        <td>
                            {{ $pdf->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pdf.fields.created_by') }}
                        </th>
                        <td>
                            {{ $pdf->created_by->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pdfs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection