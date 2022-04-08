{{--  full-width-section  --}}
<footer id="footer" class="full-width-section">
	<div class="container text-white">
		<div class="footer-ribbon">
			<span>Get in Touch</span>
		</div>
		<div class="row py-5 my-4">
			<div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
				<h5 class="text-3 mb-3">NEWSLETTER</h5>
				<p class="pr-1">Stay current on our always evolving product features and technology. Enter your email address and subscribe to our short once weekly newsletter.</p>
				<div class="alert alert-success d-none" id="newsletterSuccess">
					<strong>Success!</strong> You've been added to our email list.
				</div>
				<div class="alert alert-danger d-none" id="newsletterError"></div>
								{{-- <form action="https://www.getdrip.com/forms/229401838/submissions" method="POST" class="mr-4 mb-3 mb-md-0" data-drip-embedded-form="229401838" id="drip-ef-229401838">
                    <div class="input-group input-group-rounded">

                        <input class="form-control form-control-sm bg-light" placeholder="Email Address" id="drip-email" name="fields[email]" type="text">
                          <div style="display: none;" aria-hidden="true">
                            <label for="website">Website</label><br>
                            <input type="text" id="website" name="website" tabindex="-1" autocomplete="false" value="">
                          </div>
                        <span class="input-group-append">
                            <button class="btn btn-light text-color-dark" type="submit" data-drip-attribute="sign-up-button"><strong>GO!</strong></button>
                        </span>
                    </div>
                </form> --}}

				<a href="https://www.getdrip.com/forms/945330930/submissions/new" data-drip-show-form="945330930" class="btn btn-modern btn-primary mt-1">SUBSCRIBE NOW!</a>

			</div>



			{{--@env(['stage', 'development', 'local'])--}}

			{{-- @if(isset($footer_widget_menu))
				<div class="col-md-6 col-lg-3 mb-4 mb-lg-0">

					@foreach($footer_widget_menu as $menu)
						@if ($menu['link']=='')
							<h5 class="text-3 mb-3">{{ $menu['label'] }}</h5>
						@else
							<a href="{{ preg_replace("/%u([0-9a-f]{3,4})/i","&#x\\1;",urldecode(strpos($menu['link'], "http") === 0 ? $menu['link'] : url('', $menu['link']))) }}" title="{{ $menu['label'] }}">
								<h5 class="text-3 mb-3">{{ $menu['label'] }}</h5>
							</a>
						@endif

						@if( $menu['child'] )
							<div id="" class="text-color-light">
								<p>
									@foreach( $menu['child'] as $child )
										<a class="text-color-light" href="{{  preg_replace("/%u([0-9a-f]{3,4})/i","&#x\\1;",urldecode(strpos($child['link'], "http") === 0 ? $child['link'] : url('',$child['link']))) }}" title="{{ $child['label'] }}">{{ $child['label'] }}</a><br>
									@endforeach
								</p>
							</div>
						@endif
					@endforeach
				</div>
			@endif --}}


			<div class="col-md-6 col-lg-3 mb-4 mb-md-0">
				<div class="contact-details">
					<a href="#"><h5 class="text-3 mb-3">CONTACT US</h5></a>
					<ul class="list list-icons list-icons-lg">
						<li class="mb-1"><i class="fas fa-location-arrow"></i><a class=" text-color-light" href="https://g.page/codecorp?share" target="_blank">434 West Ascension Way, Ste. 300<br>Murray UT 84123</a></li>
						<li class="mb-1"><i class="fas fa-phone"></i><p class="m-0"><a class=" text-color-light" href="tel:8014952200">+01 801-495-2200</a></p></li>
						<li class="mb-1"><i class="fas fa-fax"></i><p class="m-0"><a class=" text-color-light" href="tel:8014952202"> +01 801-495-2202</a></p></li>
						<li class="mb-1"><i class="far fa-envelope"></i><p class="m-0"><a class=" text-color-light" href="mailto:info@codecorp.com">info@codecorp.com</a></p></li>
					</ul>
				</div>
			</div>
			<div class="col-md-6 col-lg-2">
				<h5 class="text-3 mb-3">FOLLOW US</h5>
				<ul class="social-icons">
					<li class="social-icons-facebook"><a href="https://www.facebook.com/code411" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
					<li class="social-icons-twitter"><a href="https://twitter.com/codecorp" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
					<li class="social-icons-linkedin"><a href="https://www.linkedin.com/company/code-corporation" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="container py-2">
			<div class="row py-4" itemscope itemtype="https://schema.org/Organization">
			 <meta itemprop="name" content="Code">
                <div class="col-lg-2 d-flex align-items-center justify-content-center justify-content-lg-start mb-2 mb-lg-0" itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
                    <meta itemprop="logo" content="{{ url('site/img/logo.png') }}">
                    <meta itemprop="width" content="320">
                    <meta itemprop="height" content="60">

                    <a itemprop="url"  href="{{ url('/') }}" class="logo pr-0 pr-lg-3">
                        <img itemprop="image"  alt="Code Logo" src="{{ asset('site/img/code-logo-white.png') }}" class="opacity-5" height="20"> &nbsp;
                    </a>
                </div>
				<div class="col-lg-4 d-flex align-items-center justify-content-center justify-content-lg-start mb-4 mb-lg-0">
					<p>    © Copyright CodeCorp 2020. All Rights Reserved.</p>

				</div>
							{{-- @env(['production'])
									<div class="col-lg-4 d-flex align-items-center justify-content-center justify-content-lg-end text-color-light text-white">
										<nav id="sub-menu">
											<ul>
 
												<li><i class="fas fa-angle-right"></i><a href="{{ route('support.privacy') }}"  class="ml-1 text-decoration-none text-color-light">Privacy Policy</a></li>
 												<li><i class="fas fa-angle-right"></i><a href="{{ route('support.eula') }}" class="ml-1 text-decoration-none text-color-light">EULA</a></li> 
 
												<li><i class="fas fa-angle-right"></i><a href="{{ route('contact') }}" class="ml-1 text-decoration-none text-color-light"> Contact Us</a></li>
											</ul>
										</nav>
									</div>
								@endenv --}}


	  				{{-- @include('site.layouts.partials.copyright-menu', ['copyright_menu' => $copyright_menu])  --}}


			</div>
		</div>
	</div>

</footer>