			<header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 30, 'stickyHeaderContainerHeight': 70}">
				<div class="header-body">
					<div class="header-container container">
						<div class="header-row">
							<div class="header-column">
								<div class="header-row">
									<div class="header-logo" style="width: 200px; height: 46.5625px;" itemscope itemtype="http://schema.org/Organization">
                        				<a itemprop="url" href="{{ url('/') }}">
                           					<img itemprop="logo" alt="Code Logo" width="200" height="auto" data-sticky-width="82" data-sticky-height="auto" src="{{ asset('site/img/code_logo_300w.png') }}">
                        				</a>

                     				</div>
								</div>
							</div>
							<div class="header-column justify-content-end">
								<div class="header-row">
									<div class="header-nav header-nav-line header-nav-top-line header-nav-top-line-with-border order-2 order-lg-1">
										<div class="header-nav-main header-nav-main-square header-nav-main-effect-2 header-nav-main-sub-effect-1">

										@include('layouts.private-partials.nav') 

										</div>
										<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
											<i class="fas fa-bars"></i>
										</button>
									</div>


								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
 