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

        <!-- Trigger the modal with a button -->
        {{-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#designQrModal">Open Modal</button> --}}

        @include('site.qrcode-portal.partials.designQrModal')

        @include('site.qrcode-portal.partials.stepone')

        @include('site.qrcode-portal.partials.websiteStep')

        @include('site.qrcode-portal.partials.socialMediaStep')

        @include('site.qrcode-portal.partials.vCardPlusStep')
        
        @include('site.qrcode-portal.partials.businessPageStep')

        @include('site.qrcode-portal.partials.footerGenerator')

    </div>
@endsection

@section('below-content')
@endsection

@section('scripts')

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyB72pcnRocqIZfZFEjnHuqRA6BVV92oZyg"></script>

    @parent

    <script>
        $('.color-picker').colorpicker({
            
        });
    </script>

<script>
    autocomplete();

function autocomplete() {
    var inputs = document.getElementsByClassName('autocomplete');

    var options = {};

    var autocompletes = [];

    for (var i = 0; i < inputs.length; i++) {
        var autocomplete = new google.maps.places.Autocomplete(inputs[i], options);
        autocomplete.inputId = inputs[i].id;
        autocomplete.index = i;
        autocomplete.addListener('place_changed', fillIn);
        autocompletes.push(autocomplete);

    }
}


function fillIn() {
    var place = this.getPlace();
    // console.log(place);
    var lat = place.geometry.location.lat();
    var long = place.geometry.location.lng();
    $('#latitude').val(lat);
    $('#longitude').val(long);
    // $('#street_address').val(place.formatted_address);

    var address_components = place.address_components;
    var locality = '';
    var state = 0;
    var country = 0;
    var postal_code = '';

    $.each(address_components, function(index, component) {

        var types = component.types;
        $.each(types, function(index, type) {
            if (type == 'locality') {
                locality = component.long_name;
            }
            if (type == 'administrative_area_level_1') {
                state = component.short_name;
            }
            if (type == 'country') {
                country = component.short_name;
            }
            if (type == 'postal_code') {
                postal_code = component.short_name;
            }

        });
    });
    $('#city').val(locality);
    $('#state').val(state);
    $('#country').val(country);
    $('#zipcode').val(postal_code);

    $('#apiAddress').hide();
    $('#fullAddress').show();
    $('.additional-link').attr('type', 2);

    $('#city').trigger('change');
}
</script>
@endsection
