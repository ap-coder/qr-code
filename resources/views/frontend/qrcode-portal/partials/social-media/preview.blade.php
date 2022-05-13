<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Social Media Page</title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Permanent+Marker&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{ asset('site/vendor/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('site/css/qr-code.css') }}">
    </head>

<body id="dsocial-body">
    <div class="vcard-template style2">

        <div class="blur-bgd hidden-sm hidden-xs" style="background: url({{ asset('site/img/social-media-banner/Header_SocialMedia_1.svg') }});">
        </div>

        <div class="vcard-header">
            <div class="vcard-header-wrapper">
                <div class="vcard-top-info avatar-container"
                style="background-color: #3766b8;-webkit-mask: url({{ asset('site/img/social-media-banner/Header_SocialMedia_1.svg') }}) no-repeat 50% 50%;mask: url({{ asset('site/img/social-media-banner/Header_SocialMedia_1.svg') }}) no-repeat 50% 50%;-webkit-mask-size: cover;mask-size: cover;background-size: 100%;">
            </div>
            <div class="event-section-title shadow-2" style="background: rgb(68, 127, 182);">
                <div class="event-content-container">
                    <div class="event-title dynamicTextColor">Connect with us on social media</div>
                    <div class="event-teaser mt-10 dynamicTextColor">
                        Follow us and get updates delivered to your favorite social media channel.
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="event-body">
            <div class="vcard-body-wrapper">
                <div class="vcard-body">
                    <div id="devent-details">
                        <a target="_self" class="channel-container"
                            id="channel-item-website" href="#channel-item-website">
                            <div class="pl-55 pos-relative">
                                <div class="channel-bgd-website channel-bgd">
                                    <i class="fas fa-globe"></i>
                                </div>
                                <div class="channel-prop-container pull-left">
                                    <span>
                                       <span>
                                            <div class="channel-name mb-5">
                                                Visit us online
                                            </div>
                                            <div class="channel-label">
                                                www.your-website.com
                                            </div>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </a>
                        <a target="_self" class="channel-container"
                            id="channel-item-facebook" href="#channel-item-facebook">
                            <div class="pl-55 pos-relative">
                                <div class="channel-bgd-facebook channel-bgd">
                                    <i class="fab fa-facebook"></i>
                                </div>
                                <div class="channel-prop-container pull-left">
                                    <span>
                                       <span>
                                            <div class="channel-name mb-5">
                                                Become a fan
                                            </div>
                                            <div class="channel-label">
                                                www.facebook.com/page
                                            </div>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </a>
                        <a target="_self" class="channel-container"
                            id="channel-item-youtube" href="#channel-item-youtube">
                            <div class="pl-55 pos-relative">
                                <div class="channel-bgd-youtube channel-bgd">
                                    <i class="fab fa-youtube"></i>
                                </div>
                                <div class="channel-prop-container pull-left">
                                    <span>
                                       <span>
                                            <div class="channel-name mb-5">
                                                Watch our videos
                                            </div>
                                            <div class="channel-label">
                                                www.youtube.com/user/mychannel
                                            </div>
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="vcard-row follow-scroll share-container">
                        <div class="fabs" id="shareFab">
                            {{-- <div class="fixed-blur-bgd" style="display: none;">
                                <div class="chat">
                                    <div class="fab-body">
                                        <div class="icon-fab-close"></div>
                                        <div class="fab-header" style="color: rgb(233, 30, 99);">Share page</div>
                                        <ul class="ssk-block ssk-md" data-url="http://app.qr-code-generator.com/?trackSharing=1" data-text="">
                                            <li>
                                                <i class="icon-fab-share-facebook"></i>
                                                <a href="" class="ssk ssk-text ssk-facebook">Facebook</a>
                                            </li>
                                            <li>
                                                <i class="icon-fab-share-twitter"></i>
                                                <a href="" class="ssk ssk-text ssk-twitter">Twitter</a>
                                            </li>
                                            <li>
                                                <i class="icon-fab-share-googleplus"></i>
                                                <a href="" class="ssk ssk-text ssk-google-plus">Google+</a>
                                            </li>
                                            <li>
                                                <i class="iconFab icon-fab-share-whatsapp"></i>
                                                <a href="whatsapp://send?text=http://app.qr-code-generator.com/?trackSharing=1" class="ssk ssk-whatsapp">Whatsapp</a>
                                            </li>
                                            <li>
                                                <i class="icon-fab-share-email"></i>
                                                <a href="mailto:?body=http://app.qr-code-generator.com/?trackSharing=1" target="_blank">Email</a>
                                            </li>
                                            <li>
                                                <i class="icon-fab-share-message"></i>
                                                <input id="shortUrl" value="http://app.qr-code-generator.com/" readonly="">
                                                <button id="copyButton">Copy</button>
                                                <div class="ifCopySucceed ng-hide" ng-show="ifCopySucceed">
                                                    Text copied to the clipboard.                        </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div> --}}
                            <a class="fabshare" style="background: rgb(233, 30, 99);">
                                <span class="hidden-xs" style="color: white;">
                                    <i class="prime fas fa-share-alt"></i>
                                    Share this page        </span>
                                <i class="prime fas fa-share-alt visible-xs" style="color: white;"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
