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

<body id="dvcard-body" class="whiteTheme">
    <div class="vcard-template style2">
        <div class="page-home page">
            <div class="vcard-header" style="background: rgb(68, 127, 182);">
                <div class="vcard-header-wrapper">
                    <div class="vcard-top-info">
                        <h4 class="top"></h4>
                        <div id="avtarImage" class="img"
                            style="background: url({{ asset('site/img/11_20.png') }});">
                        </div>
                        <h2 class="name dynamicTextColor"><span id="first_name">Jane</span> <span id="last_name">Doe</span> </h2>
                        <h2 class="name dynamicTextColor company" style="display: none;">Company Name</h2>
                        <h6 class="title dynamicTextColor your_job" id="your_job">{{ $vCard->designation ?? 'Designer' }}</h6>
                    </div>
                    <div class="vcard-functions">
                        <div class="vcard-functions-wrapper">

                            <a href="tel:+1-555-555-1234" id="is_mobile_number">
                                <i class="fa fa-phone-alt dynamicTextColor"></i>
                                <small class="dynamicTextColor">Call</small>
                            </a>

                            <a href="mailto:jane@email.com?subject=From my vCard&amp;body=" target="_newEmail" id="is_email">
                                <i class="fa fa-paper-plane dynamicTextColor"></i>
                                <small class="dynamicTextColor">Email</small>
                            </a>
                            <a class="last-element" id="is_direction_show">
                                <i class="fa fa-map-marker-alt dynamicTextColor"></i>
                                <small class="dynamicTextColor">Directions</small>
                            </a>
                            


                        </div>
                    </div>
                </div>
            </div>
            <div class="vcard-body-wrapper">
                {{-- ng-hide="view.numbers_mobile ||  view.numbers_phone ||  view.email || view.city ||view.street|| view.zip|| view.country || view.company || view.bio || view.website" class="" --}}
                
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
                       
                        <div class="vcard-row" id="summary">
                            <h4>Seeking for freelance work with over 10 years of graphic design experience. Feel free to get in touch!
                            </h4>
                        </div>
                        <div class="vcard-separator"></div>
                        <div class="vcard-row" id="mobile_number">
                            <i class="fa fa-phone-alt"></i>
                            <h4><a href="tel:+1-555-555-1234">+1-555-555-1234</a></h4>
                            <small>Mobile</small>
                        </div>
                        <div class="vcard-row pt0"  id="home_phone">
                            <i class="fa fa-phone-alt"></i>
                            <h4><a href="tel:+1-555-555-1234">+1-555-555-1234</a></h4>
                            <small>Telephone</small>
                        </div>
                        <div class="vcard-row pt0" id="fax_number">
                            <i class="fa fa-fax"></i>
                            <h4>1‐855‐392‐2666</h4>
                            <small>Fax</small>
                        </div>
                        <div class="vcard-separator"></div>
                        <div class="vcard-row" id="email">
                            <i class="fa fa-envelope"></i>
                            <h4><a href="mailto:jane@email.com" target="_newLink"
                                    >jane@email.com</a></h4>
                            <small>Email</small>
                        </div>
                        <div class="vcard-separator"></div>
                        <div class="vcard-row" id="company_box">
                            <i class="fa fa-briefcase"></i>
                            <h4 class="company_h4">Jane Doe Agency</h4>
                            <small class="your_job">Designer</small>
                        </div>
                        <div class="vcard-separator">
                        </div>
                        <div class="vcard-row" id="address_box">
                            <label></label>
                            <i class="fa fa-map-marker-alt"></i>
                            <h4> <span id="street_address_h4">
                                1000 Marketplace Ave.</span> <span id="number_h4"></span> </h4>
                            <h4> <span id="city_h4">NY</span> <span id="state_h4"> </span> <span id="zipcode_h4">10001</span>
                            </h4>
                            <h4 id="country_h4">United States
                            </h4>

                            {{-- <div class="floated-container" id="street_address">
                                <a class="event-slim-button ripplelink left_15 mt-10" style="color: rgb(233, 30, 99);">
                                    Show on map </a>
                            </div> --}}
                        </div>
                        <div class="vcard-separator">
                        </div>

                        <div class="vcard-row" id="website_link">
                            <i class="fa fa-globe"></i>
                            <h4><a href="https://yourwebsite.com/" target="_newLink">https://yourwebsite.com/</a></h4>
                            <small>Website</small>
                        </div>
                        <div class="vcard-separator">
                        </div>
                        <div id="socialmedialinksContainer" style="display: none;">
                            <div class="vcard-social" style="margin-bottom:20px;">
                               
                                <div class="socialMedia-container">
                                    <label>Social Media</label>
                                    <div class="channels-padding mt-0 channels-list">
                                       {{-- <a
                                            href="https://codefarming.com/" target="_blank"
                                            class="channel-container" id="channel-item-Facebook"
                                            >
                                                <div class="channel-bgd-facebook">
                                                   <i class="fab fa-facebook"></i>
                                                </div>
                                        </a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

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
