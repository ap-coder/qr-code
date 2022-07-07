<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Business Page</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light"
        rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Permanent+Marker&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('site/vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/qr-code.css') }}">
</head>

<body id="devent-body" class="whiteTheme">
    <div class="vcard-template style2">
        <div class="blur-bgd">
            <div style="background: url({{ asset('site/img/header.jpg') }}"></div>
        </div>
        <div class="page-home page">
            <div class="vcard-header">
                <div class="vcard-header-wrapper">
                    <div class="event-section-title top-bar-desktop" style="float: none; background: rgb(68, 127, 182);">
                        <div class="event-content-container">
                            <div class="event-title dynamicTextColor" style="font-size: 16px !important;">
                                Joy's Cafe
                            </div>
                        </div>
                    </div>
                    <div class="vcard-top-info avatar-container" style="background: url({{ asset('site/img/header.jpg') }}) 0% 0% / 100% rgb(255, 255, 255);">
                    </div>
                    <div class="event-section-title" id="qr-header" style="background: rgb(68, 127, 182);">
                        <div class="event-content-container top-info-desktop">
    
                            <div class="event-tagline dynamicTextColor">Eat. Refresh. Go.
                            </div>
                            <div class="event-teaser mt-10 text-break dynamicTextColor">We aim to provide fresh and healthy snacks for people on the go.
                            </div>
    
                           <a class="ripplelink event-action-btn" style="color: rgb(68, 127, 182);">
                                View Menu
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="event-body">
                <div class="vcard-body-wrapper">
                    <div class="vcard-body">

                        <div id="devent-details">
                            <div class="vcard-row" style="padding-right: 10px !important; cursor: pointer;" id="opening_hours_section">
                                <label>Opening Hours</label>
                                <i class="fa fa-clock"></i>
                        
                                <div id="opening_hours_box">
                                        {{-- <div class="row mb-5 mb-10">
                                        <div class="col-xs-4">
                                            <h4 style="white-space: nowrap;" class="open-hours--active">
                                                Tue
                                                <span class="caret caret--open hide"></span>
                                            </h4>
                                            <span>
                                                <span class="open-now">Open Now</span>
                                                <span class="closed-now hide">Closed Now</span>
                                            </span>
                                        </div>
                                        <div class="col-xs-8">
                                            <div>
                                                <h4 style="white-space: nowrap;" class=" open-hours--active">
                                                    8:00 am - 8:00 pm
                                                    <span class="caret caret--open"></span>
                                                </h4>
                                            </div>
                                        </div>
                                    </div> --}}
                                    
                                    <div class="row mb-5 text-muted">
                                        <div class="col-xs-4">
                                            <h4  style="white-space: nowrap;" class=" open-hours--not-active">
                                                Mon
                                                <span class="caret caret--open hide" ></span>
                                            </h4>
                                            <span  >
                                                <span class="open-now hide" >Open Now</span>
                                                <span class="closed-now hide">Closed Now</span>
                                            </span>
                                        </div>
                                        <div class="col-xs-8">
                                        <div >
                                                <h4  style="white-space: nowrap;" class=" open-hours--not-active">
                                                    8:00 am - 8:00 pm
                                                    <span class="caret caret--open hide"></span>
                                                </h4>
                                            </div>
                            
                                        </div>
                                    </div>
                                    <div class="row mb-5 text-muted">
                                        <div class="col-xs-4">
                                            <h4  style="white-space: nowrap;" class=" open-hours--not-active">
                                                Tue
                                                <span class="caret caret--open hide" ></span>
                                            </h4>
                                            <span  >
                                                <span class="open-now hide" >Open Now</span>
                                                <span class="closed-now hide">Closed Now</span>
                                            </span>
                                        </div>
                                        <div class="col-xs-8">
                                        <div >
                                                <h4  style="white-space: nowrap;" class=" open-hours--not-active">
                                                    8:00 am - 8:00 pm
                                                    <span class="caret caret--open hide"></span>
                                                </h4>
                                            </div>
                            
                                        </div>
                                    </div>
                                    <div class="row mb-5 text-muted">
                                        <div class="col-xs-4">
                                            <h4 class="open-hours--not-active">
                                                Wed
                                                <span class="caret caret--open  hide"></span>
                                            </h4>
                                            <span>
                                                <span class="open-now  hide">Open Now</span>
                                                <span class="closed-now  hide">Closed Now</span>
                                            </span>
                                        </div>
                                        <div class="col-xs-8">
                                            <div>
                                                <h4 style="white-space: nowrap;" class="open-hours--not-active">
                                                    8:00 am - 8:00 pm
                                                    <span class="caret caret--open  hide"></span>
                                                </h4>
                                            </div>
                            
                                            
                                        </div>
                                    </div>
                                    <div class="row mb-5 text-muted">
                                        <div class="col-xs-4">
                                            <h4 style="white-space: nowrap;" class=" open-hours--not-active">
                                                Thu
                                                <span class="caret caret--open hide"></span>
                                            </h4>
                                            <span>
                                                <span class="open-now  hide">Open Now</span>
                                                <span class="closed-now  hide">Closed Now</span>
                                            </span>
                                        </div>
                                        <div class="col-xs-8">
                                            <div>
                                                <h4  style="white-space: nowrap;" class=" open-hours--not-active">
                                                    8:00 am - 8:00 pm
                                                    <span class="caret caret--open hide"></span>
                                                </h4>
                                            </div>
                            
                                            
                                        </div>
                                    </div>
                                    <div class="row mb-5 text-muted">
                                        <div class="col-xs-4">
                                            <h4  style="white-space: nowrap;" class=" open-hours--not-active">
                                                Fri
                                                <span class="caret caret--open hide"></span>
                                            </h4>
                                            <span>
                                                <span class="open-now hide">Open Now</span>
                                                <span class="closed-now hide">Closed Now</span>
                                            </span>
                                        </div>
                                        <div class="col-xs-8">
                                            <div>
                                                <h4  style="white-space: nowrap;" class=" open-hours--not-active">
                                                    8:00 am - 8:00 pm
                                                    <span class="caret caret--open hide"></span>
                                                </h4>
                                            </div>
                            
                                            
                                        </div>
                                    </div>
                                    <div class="row mb-5 text-muted">
                                        <div class="col-xs-4">
                                            <h4  style="white-space: nowrap;" class=" open-hours--not-active">
                                                Sat
                                                <span class="caret caret--open hide"></span>
                                            </h4>
                                            <span>
                                                <span class="open-now hide">Open Now</span>
                                                <span class="closed-now hide">Closed Now</span>
                                            </span>
                                        </div>
                                        <div class="col-xs-8">
                                        <div>
                                                <h4  style="white-space: nowrap;" class=" open-hours--not-active">
                                                    8:00 am - 8:00 pm
                                                    <span class="caret caret--open hide"></span>
                                                </h4>
                                            </div>
                            
                                            
                                        </div>
                                    </div>
                                    <div class="row mb-5 text-muted" >
                                        <div class="col-xs-4">
                                            <h4  style="white-space: nowrap;" class=" open-hours--not-active">
                                                Sun
                                                <span class="caret caret--open hide" ></span>
                                            </h4>
                                            <span  >
                                                <span class="open-now hide" >Open Now</span>
                                                <span class="closed-now hide">Closed Now</span>
                                            </span>
                                        </div>
                                        <div class="col-xs-8">
                                            <div >
                                                <h4  style="white-space: nowrap;" class=" open-hours--not-active">
                                                    8:00 am - 8:00 pm
                                                    <span class="caret caret--open hide"></span>
                                                </h4>
                                            </div>
                            
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="vcard-separator"></div>

                            <div class="vcard-row" id="address_box">
                                <label>Location</label>
                                <i class="fa fa-map-marker-alt"></i>
                                <h4> <span id="street_address_h4">
                                    Mission Street</span> <span id="number_h4"> 526</span> </h4>
                                <h4> <span id="city_h4">San Francisco</span> <span id="state_h4"> CA</span> <span id="zipcode_h4"> 94105</span>
                                </h4>
                                <h4 id="country_h4">United States
                                </h4>
    
                                <div class="floated-container" id="street_address">
                                    <a class="event-slim-button ripplelink left_20 mt-10" style="color: rgb(233, 30, 99);">
                                        Show on map </a>
                                </div>
                            </div>

                            {{-- <div class="vcard-row" id="address_box">
                                <label>Location</label>
                                <i class="fa fa-map-marker-alt"></i>
                                <h4>Mission Street 526</h4>
                                <h4>San Francisco<span><span>,</span> CA 94105</span>
                                </h4>
                                <h4>United States</h4>
                        
                                <div class="floated-container">
                                    <a class="event-slim-button ripplelink left_20 mt-10" style="color: rgb(233, 30, 99);">
                                        Show on map</a>
                                </div>
                            </div> --}}

                            <div class="vcard-row" style="display: none;" id="features-container">
                                <label class="">Facility Features</label>
                                <ul class="features-container">
                                    {{-- <li>
                                        <i class="fa fa-wifi"></i>
                                    </li>
                                    <li>
                                        <i class="fas fa-chair"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-wheelchair"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-toilet"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-child"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-paw"></i>
                                    </li>
                                    <li>
                                        <i class="fas fa-parking"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-train"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-taxi"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-bed"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-coffee"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-wine-glass-alt"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-utensils"></i>
                                    </li> --}}
                                </ul>
                            </div>

                            <div class="vcard-separator"></div>

                            <div class="vcard-row" id="about" style="display: none;">
                                <label>About</label>
                                <i class="fa fa-info-circle"></i>
                                <h4 class="text-break"></h4>
                            </div>

                            <div class="vcard-separator"></div>

                            <div class="vcard-row" id="contact-info">
                                <label>Contact</label>
                                <i class="fa fa-address-book"></i>
                        
                                <div id="name">
                                    <h4>Joy</h4>
                                    <small class="mb-30">Name</small>
                                </div>
                        
                                <div id="phone">
                                    <h4><a href="tel:4150000000">(415) 000-0000</a></h4>
                                    <small class="mb-30">Phone</small>
                                </div>
                        
                                <div id="email"> 
                                    <h4><a href="mailto:hello@joyscafe.com" target="_blank" >hello@joyscafe.com</a></h4>
                                    <small class="mb-30">Email</small>
                                </div>
                        
                                <div id="website">
                                    <h4><a href="http://www.joyscafe.com" target="_blank" >www.joyscafe.com</a></h4>
                                    <small class="mb-30">Website</small>
                                </div>
                            </div>

                            <div id="social-icons" style="display: none;">
                                <div class="vcard-separator"></div>

                                <div class="vcard-row">
                                    <label>Social Media</label>
                                    <i class="fas fa-bullhorn" style="font-size: 30px;"></i>
                            
                                    <div class="row">

                                        {{-- <div class="col-xs-4 col-sm-3 col-md-2" style="margin-bottom: 10px;">
                            
                                            <a href="https://codefarming.com/" target="_blank" class="channel-container" id="channel-item-Facebook">
                                                <span class="channel-bgd-facebook">
                                                    <i class="fab fa-facebook"></i>
                                                </span>
                                            </a>
                            
                                        </div> --}}
                                       
                                    </div>
                            
                                </div>
                            </div>
                            

                            <div class="vcard-row follow-scroll share-container">
                                <div class="fabs" id="shareFab" style="position: fixed; display: block; top: 47px; right: 213px; bottom: auto;">
                            {{-- <div class="fixed-blur-bgd">
                                <div class="chat">
                                    <div class="fab-body">
                                        <div class="icon-event-close"></div>
                                        <div class="fab-header" style="color: rgb(233, 30, 99);">
                                            Menu</div>
                                        <ul>
                                            <li>
                                                <i class="icon-business-popup-phone"></i>
                                                <a href="tel:4150000000">
                                                    Call  </a>
                                            </li>
                                            <li>
                                                <i class="icon-business-popup-email"></i>
                                                <a href="mailto:hello@joyscafe.com" target="_blank" >
                                                    Email                        </a>
                                            </li>
                                            <li>
                                                <i class="icon-business-popup-web"></i>
                                                <a href="http://www.joyscafe.com" target="_blank" >
                                                    Website                        </a>
                                            </li>
                                            <li>
                                                <i class="icon-fab-share"></i>
                                                <a href="#" id="share-fab-button">
                                                    Share page                        </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div> --}}
                            <a id="prime" class="fabshare" style="background: rgb(233, 30, 99);">
                                <i class="prime fa fa-bars" style="color: white;"></i>
                            </a>
                        </div>
                            </div>

                            
                        </div>
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <script src="{{ asset('site/vendor/jquery/jquery.min.js') }}"></script>
    <script>
         $(document).ready(function () {

var moveFab = function () {
    if (window.innerWidth >= 1024) {
        $("#shareFab").css({
            position: "fixed",
            display: "block",
            top: (($(".vcard-top-info").height() ? 400 : $("#qr-header").outerHeight()) + 84 + 15 - 56 / 2 - $(window).scrollTop()) + "px",
            right: (window.innerWidth / 2 - 320 - 150) + "px",
            bottom: "auto"
        });
    } else if (window.innerWidth >= 667) {
        $("#shareFab").css({
            position: "fixed",
            display: "block",
            top: "auto",
            right: (window.innerWidth / 2 - 320) + "px",
            bottom: "10px"
        });
    } else {
        $("#shareFab").css({
            position: "fixed",
            display: "block",
            top: "auto",
            right: "10px",
            bottom: "10px"
        });
    }
};

$(window).resize(function () {
    if (window.innerWidth >= 667) {
        $('.follow-scroll.calendar-container').removeAttr('style');
        $('.follow-scroll.share-container').removeAttr('style');
    }

    moveFab();
});

$(window).scroll(function () {
    moveFab();
});

moveFab();
         });
    </script>
</body>

</html>
