<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.private-partials.head')

<body>
	<div class="body">
		@include('layouts.private-partials.header')
		<div role="main" class="main">
			<section class="page-header page-header-modern bg-color-dark page-header-md">
				<div class="container">
					<div class="row">
						<div class="col-md-8 order-2 order-md-1 align-self-center p-static">
							<h1 class=""><strong>@yield('page-name', 'Private Area')</strong></h1>
						</div>
						<div class="col-md-4 order-1 order-md-2 align-self-center">
							<ul class="breadcrumb d-block text-md-right breadcrumb-light">
								 <li><a href="{{ url('/') }}">Code</a></li>
								<li><a href="{{ url('/private/home') }}">Private Area</a></li>
								<li class="active">@yield('page-name')</li>
							</ul>
						</div>
					</div>
				</div>
			</section>

			<div class="container py-5">
				<div class="row">

						<div class="col-lg-12 order-1 order-lg-2">
							@include('layouts.private-partials.topnav.qrcode')
							@yield('content')
						</div>
					</div>
				</div>
		</div>
	</div>
</body>


@include('layouts.private-partials.javascript')


@yield('scripts')
</html>
