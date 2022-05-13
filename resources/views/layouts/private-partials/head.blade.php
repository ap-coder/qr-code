	<head>
		<input type="hidden" id="basUrl" name="basUrl" value="{{ url('') }}/">
		<meta name="csrf-token" content="{{ csrf_token() }}" />
		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Permanent+Marker&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{ asset('site/vendor/bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('site/vendor/fontawesome-free/css/all.min.css') }}">
		{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> --}}
		<link rel="stylesheet" href="{{ asset('site/vendor/animate/animate.min.css') }}">
		<link rel="stylesheet" href="{{ asset('site/vendor/simple-line-icons/css/simple-line-icons.min.css') }}">
		<link rel="stylesheet" href="{{ asset('site/vendor/owl.carousel/assets/owl.carousel.min.css') }}">

		<link rel="stylesheet" href="{{ asset('site/vendor/owl.carousel/assets/owl.theme.default.min.css') }}">
		<link rel="stylesheet" href="{{ asset('site/vendor/magnific-popup/magnific-popup.min.css') }}">
		<link rel="stylesheet" href="{{ asset('site/vendor/bootstrap-star-rating/css/star-rating.min.css') }}">
		<link rel="stylesheet" href="{{ asset('site/vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.css') }}">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{ asset('site/css/theme.css') }}">
		<link rel="stylesheet" href="{{ asset('site/css/theme-elements.css') }}">
		
		<!-- Current Page CSS -->
		<link rel="stylesheet" href="{{ asset('site/vendor/circle-flip-slideshow/css/component.css') }}">

		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

		<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.3.3/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    
		<link rel="stylesheet" href="{{ asset('site/slick/slick.css') }}">
		<link rel="stylesheet" href="{{ asset('site/slick/slick-theme.css') }}">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
		
		<!-- Skin CSS -->
		{{-- <link rel="stylesheet" href="{{ asset('site/css/skins/default.css') }}"> --}}
		<link rel="stylesheet" href="{{ asset('site/css/default.css') }}">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{ asset('site/css/custom.css') }}">
		<link rel="stylesheet" href="{{ asset('site/css/qr-code.css') }}">

		

		<!-- Head Libs -->
		<script src="{{ asset('site/vendor/modernizr/modernizr.min.js') }}"></script>

		@yield('styles')
		@yield('top-scripts')

	</head>
