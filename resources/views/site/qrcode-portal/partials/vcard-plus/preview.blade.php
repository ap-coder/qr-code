<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vcard Plus</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light"
        rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Permanent+Marker&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('site/vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/qr-code.css') }}">
</head>

@if(empty($vCard))
    @php
        $bg='background: rgb(68, 127, 182);';
    @endphp
@elseif ($vCard->is_show_gradient)
    @php
        $bg='background: linear-gradient(45deg, '.$vCard->primary_color.' 0%, '.$vCard->primary_color.' 1%, '.$vCard->gradient_color.' 100%)';
    @endphp
@else
    @php
    $bg='background: '.$vCard->primary_color;
    @endphp
@endif
<body id="dvcard-body" class="whiteTheme">
    <div class="vcard-template style2">
        <div class="page-home page">
            <div class="vcard-header" style="{{ $bg }}">
                <div class="vcard-header-wrapper">
                    <div class="vcard-top-info">
                        <h4 class="top"></h4>
                        @if ($vCard->photo)
                            <div id="avtarImage" class="img"
                            style="background: url({{ $vCard->photo->getUrl() }});">
                            </div>
                        @endif
                        
                        <h2 class="name dynamicTextColor"><span id="first_name">{{ $vCard->first_name ?? '' }}</span> <span id="last_name">{{ $vCard->last_name ?? '' }}</span> </h2>
                        <h2 class="name dynamicTextColor company" style="display: none;">Company Name</h2>
                        <h6 class="title dynamicTextColor your_job" id="your_job">{{ $vCard->designation ?? '' }}</h6>
                    </div>
                    <div class="vcard-functions">
                        <div class="vcard-functions-wrapper">

                            @if ($vCard->mobile_number)
                            <a href="tel:{{ $vCard->mobile_number }}" id="is_mobile_number">
                                <i class="fa fa-phone-alt dynamicTextColor"></i>
                                <small class="dynamicTextColor">Call</small>
                            </a>
                            @endif
                            @if ($vCard->email)
                                <a href="mailto:{{ $vCard->email }}?subject=From my vCard&amp;body=" target="_newEmail" id="is_email">
                                    <i class="fa fa-paper-plane dynamicTextColor"></i>
                                    <small class="dynamicTextColor">Email</small>
                                </a>
                            @endif
                            @if ($vCard->is_direction_show==1)
                                <a class="last-element" id="is_direction_show">
                                    <i class="fa fa-map-marker-alt dynamicTextColor"></i>
                                    <small class="dynamicTextColor">Directions</small>
                                </a>
                            @endif
                            


                        </div>
                    </div>
                </div>
            </div>
            <div class="vcard-body-wrapper">

                <div class="vcard-body">
                    <div id="vcardLoader">
                        <div class="vcard-row">
                            <h4>Waiting for you to enter data</h4>
                        </div>
                        <div class="sk-three-bounce">
                            <div class="sk-child sk-bounce1"></div>
                            <div class="sk-child sk-bounce2"></div>
                            <div class="sk-child sk-bounce3"></div>
                        </div>
                    </div>

                    <div id="dvcard-details"
                        class="vcard-details--share">
                       
                        @if ($vCard->summary)
                            <div class="vcard-row" id="summary">
                                <h4>{{ $vCard->summary ?? '' }}</h4>
                            </div>
                            <div class="vcard-separator"></div>
                        @endif
                        
                        @if ($vCard->mobile_number)
                            <div class="vcard-row" id="mobile_number">
                                <i class="fa fa-phone-alt"></i>
                                <h4><a href="tel:{{  $vCard->mobile_number ?? ''  }}">{{ $vCard->mobile_number ?? '' }}</a></h4>
                                <small>Mobile</small>
                            </div>
                        @endif
                        @if ($vCard->home_phone)
                            <div class="vcard-row" id="home_phone">
                                <i class="fa fa-phone-alt"></i>
                                <h4><a href="tel:{{  $vCard->home_phone ?? ''  }}">{{ $vCard->home_phone ?? '' }}</a></h4>
                                <small>Telephone</small>
                            </div>
                        @endif
                        
                        @if ($vCard->fax_number)
                            <div class="vcard-row pt0" id="fax_number">
                                <i class="fa fa-fax"></i>
                                <h4>{{ $vCard->fax_number ?? '' }}</h4>
                                <small>Fax</small>
                            </div>
                        @endif

                        @if ($vCard->email)
                            <div class="vcard-separator"></div>
                            <div class="vcard-row" id="email">
                                <i class="fa fa-envelope"></i>
                                <h4><a href="mailto:{{ $vCard->email ?? '' }}" target="_newLink"
                                        >{{ $vCard->email ?? '' }}</a></h4>
                                <small>Email</small>
                            </div>
                        @endif

                        @if ($vCard->company || $vCard->designation)
                            <div class="vcard-separator"></div>
                            <div class="vcard-row" id="company_box">
                                <i class="fa fa-briefcase"></i>
                                <h4 class="company_h4">{{ $vCard->company ?? '' }}</h4>
                                <small class="your_job">{{ $vCard->designation ?? '' }}</small>
                            </div>
                        @endif

                        @if ($vCard->address)
                            <div class="vcard-separator">
                            </div>
                            <div class="vcard-row" id="address_box">
                                <label></label>
                                <i class="fa fa-map-marker-alt"></i>
                                <h4> <span id="street_address_h4">
                                    {{ $vCard->address->street_address ?? '' }}</span> <span id="number_h4">{{ $vCard->address->number ?? '' }}</span> </h4>
                                <h4> <span id="city_h4">{{ $vCard->address->city ?? '' }}</span> <span id="state_h4"> {{ $vCard->address->state ?? '' }}</span> <span id="zipcode_h4">{{ $vCard->address->zipcode ?? '' }}</span>
                                </h4>
                                <h4 id="country_h4">{{ $vCard->address->country ?? '' }}</h4>

                                <div class="floated-container" id="street_address">
                                    <a class="event-slim-button ripplelink left_15 mt-10" style="color: rgb(233, 30, 99);">
                                        Show on map </a>
                                </div>
                            </div>
                        @endif

                        @if ($vCard->website_link)
                            <div class="vcard-separator">
                            </div>
                            <div class="vcard-row" id="website_link">
                                <i class="fa fa-globe"></i>
                                <h4><a href="{{ $vCard->website_link }}" target="_newLink">{{ $vCard->website_link }}</a></h4>
                                <small>Website</small>
                            </div>
                         @endif

                         @if ($vCard->socials->count()>0)
                                <div class="vcard-separator">
                                </div>
                                <div id="socialmedialinksContainer">
                                    <div class="vcard-social" style="margin-bottom:20px;">
                                    
                                        <div class="socialMedia-container">
                                            <label>Social Media</label>
                                            <div class="channels-padding mt-0 channels-list">
                                                @foreach ($vCard->socials as $social)
                                                    <a
                                                    href="{{ $social->url }}" target="_blank"
                                                    class="channel-container" id="channel-item-{{ strtolower($social->social_name)  }}"
                                                    >
                                                        <div class="channel-bgd-{{ strtolower($social->social_name)  }}">
                                                        <i class="{{ $social->icon_class }}"></i>
                                                        </div>
                                                    </a>
                                                @endforeach
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                         @endif
                        

                        <div class="vcard-row follow-scroll contactData-container fixed-button">
                            <div class="fabs" id="saveContact">
                                <a id="prime" class="fabshare" style="background: rgb(233, 30, 99);">
                                    <span class="hidden-xs" style="color: white;">
                                        <i class="prime iconFab fa fa-user-plus" style="color: white;"></i>
                                        Download vCard </span>
                                    <i class="prime iconFab fa fa-user-plus visible-xs"
                                         style="color: white;"></i>
                                </a>
                            </div>
                        </div>

                        <div class="vcard-row follow-scroll share-container fixed-button fixed-button--share-button">
                            <div class="fabs" id="shareFab">
                        <a id="prime" class="fabshare white-bgd">
                            <span class="hidden-xs">
                                <i class="prime icon iconFab fa fa-share-alt"></i>
                                Share this page        </span>
                            <i class="prime icon iconFab fa fa-share-alt visible-xs"></i>
                        </a>
                    </div>    </div>
                        
                       
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
