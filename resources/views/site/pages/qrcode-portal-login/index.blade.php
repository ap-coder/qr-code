@extends('site.layouts.app')

@section('styles') @endsection

@section('title', 'QR CODE GENERATOR')

@section('slider')
    @include('site.pages.qrcode-portal-login.partials.masthead')
@endsection

@section('content')

<section class="page-header page-header-modern bg-color-dark page-header-md">
    <div class="container">
        <div class="row">
            <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                <h1 class=""><strong>QR CODE PORTAL LOGIN</strong></h1>
            </div>

        </div>
    </div>
</section>

<div class="container py-4"  style="min-height: calc(40vh - 400px);">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-6 mb-5 mb-lg-0 loginBox">
            {{-- <h2 class="font-weight-bold text-5 mb-2">Login</h2> --}}
            @if(session()->has('message'))
                <p class="alert alert-info">
                    {{ session()->get('message') }}
                </p>
            @endif
            @include('site.pages.qrcode-portal-login.partials.login')
        </div>
        <div class="col-md-6 col-lg-6 mb-5 mb-lg-0 loginBox">

            @include('site.pages.qrcode-portal-login.partials.register')
        </div>
    </div>
</div>


<section class="call-to-action call-to-action-primary py-5 mt-5 appear-animation" data-appear-animation="fadeIn">
    <div class="container">
        <div class="row py-5 my-5">
            <div class="col text-center">
                <div class="call-to-action-content mb-5 appear-animation" data-appear-animation="fadeInUpShorter">
                    <h2 class="font-weight-normal text-color-light mb-2">CODE is <strong>everything</strong> you need to satisfy your   <strong>scanning</strong> needs!</h2>
                    <p class="font-weight-light text-5 opacity-7 mb-0">The best HTML template for your new website.</p>
                </div>
                <div class="call-to-action-btn appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">
                    <a href="#" target="_blank" class="btn btn-dark font-weight-semibold px-5 py-3">BUY NOW</a>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('scripts')
@parent

@endsection
