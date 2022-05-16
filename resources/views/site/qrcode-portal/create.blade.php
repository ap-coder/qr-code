@extends('layouts.frontend-no-sidebar')

@section('page-name')
    QR CODE GENERATOR
@endsection

@section('styles')
    <style>
        body {
            font-family: 'Source Sans Pro', sans-serif !important;
        }

        .body {
            background: #f7f7f7;
        }

    </style>
@endsection

@section('content')
    {{-- <div class="card">
        <div class="card-header">
            Create New QR Code

            <div class="float-right"><a href="{{ route('qrcode.manage.index') }}" class="btn btn-info"> <i class="fas fa-arrow-left"></i> Back</a></div>
        </div>
    </div> --}}

    <div class="generator-row">

        @include('site.qrcode-portal.partials.stepone')

        @include('site.qrcode-portal.partials.websiteStep')

        @include('site.qrcode-portal.partials.socialMediaStep')

        @include('site.qrcode-portal.partials.footerGenerator')

    </div>
@endsection

@section('below-content')
@endsection

@section('scripts')
    @parent

    <script>
        $('.color-picker').colorpicker({
            
        });
    </script>
@endsection
