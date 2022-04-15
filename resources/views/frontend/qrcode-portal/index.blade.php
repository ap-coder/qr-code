@extends('layouts.frontend-no-sidebar')

@section('page-name') QR CODE GENERATOR @endsection



@section('styles')
<style>
    body {font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"; }

    #chartdiv {width: 100%; height: 500px; }
</style>

@endsection

@section('content')

    <div class="card">
        <div class="card-header">
            Active QR Codes

            <div class="float-right"><a href="{{ route('qrcode.manage.create') }}" class="btn btn-success"> <i class="fas fa-plus"></i> CREATE QR CODE</a></div>
        </div>
        <div class="card-body">
        <div class="col-6">
            <h2>There are no active QR Codes</h2>
        </div>
        <div class="col-6">
        </div>
        </div>
    </div>


{{-- @can('frontend_partner_portal_access') --}}


{{-- @endcan --}}




@endsection

@section('below-content')
@endsection

@section('scripts')
@parent
@endsection
