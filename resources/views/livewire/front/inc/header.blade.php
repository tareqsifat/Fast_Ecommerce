	<header id="header" class="header header-style-1 bg_white">
		<!--header-->
		<div class="container-fluid">
			<div class="row">
				<!-- topbar start  -->
				@livewire('front.includes.topbar')
				<div class="header-sticky">
					<div class="container dropdown_menue_action1">
						<div class="mid-section main-info-area">
							<div class="wrap-logo-top left-section d-none d-md-none d-lg-block d-xl-block">
								<a href="{{route('home')}}" class="link-to-home "><img class="img-fluid" src='@if(isset($settings->logo)){{asset("uploads/logo/$settings->logo")}} @else {{asset("defaults/firstdeals.png")}} @endif' alt="logo"></a>
							</div>
							<!-- header search section  -->
							@livewire('front.includes.search.header-search')
							<!-- header search section end  -->
							<div class="wrap-icon right-section" @if(Auth::user()) style="width: 20%;" @endif>
								<div class="floating_footerv d-none d-xlg-block">
									<div class="row m-0">
										<div class="@if(Auth::user())  col-md-10 p-0 @else col-md-8 pl-0 @endif">
											<div class="row m-0 pb-1">
												<div class="col-md-4 p-0">
													@livewire('front.includes.cart.header-items.shipping-cart')
												</div>
												<div class="col-md-4 p-0">
													@livewire('front.includes.cart.header-items.header-wishlist')
												</div>
												<div class="col-md-4 p-0">
													@livewire('front.includes.cart.header-items.cart')
												</div>
											</div>
										</div>
										<div class="@if(Auth::user()) col-md-2 p-0 @else col-md-4 pr-0 @endif">
											@livewire('front.auth.customers.customer-login')
										</div>
									</div>
								</div>
								@livewire('front.inc.defaul-sidebar')
								<!-- mobile navigator  -->
								<div class="wrap-icon-section show-up-after-1024">
									<a href="#" class="mobile-menue-control">
										<span></span>
										<span></span>
										<span></span>
									</a>
								</div>
								@livewire('front.includes.mobile-menue')
							</div>
						</div>
					</div>
					<!-- heade navigation statert  -->
					<div class="nav-section">
						<div class="primary-nav-section">
							<div class="container">
								<div class="row w-100 m-auto">
									<div class="col-lg-3 col-md-3 pl-0">
										<ul class="nav primary w-100">
											<div class="menu-item home-icon w-100">
												<a class="userInfo_event link-term mercado-item-title">
													<i class="fa fa-bars cursor_pointer" aria-hidden="true"></i>
												</a>
												<a class="pl-0 link-term mercado-item-title menue_show">
													<strong class="navbarCategory mx-3">Categories</strong>
												</a>
												<a class="menue_show">
													<i class="fa fa-angle-down float-right"> </i>
												</a>
											</div>
										</ul>
										@if(request()->is('/'))
										@else
										@livewire('front.includes.headers.category-dropdown-menue')
										@endif
									</div>
									<div class="col-lg-6 col-md-6 p-0 dropdown_menue_action1">
										<ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Campaigns">
											<li class="menu-item">
												<a href="{{route('campaigns')}}" class="link-term mercado-item-title">Campaigns</a>
											</li>
											<li class="menu-item">
												<a href="{{route('front.shipping')}}" class="link-term mercado-item-title">Shipping Products</a>
											</li>

										</ul>
									</div>
									<div class="col-lg-3 col-md-3 p-0 dropdown_menue_action1">
										<ul class="nav primary clone-main-menu" id="menue_right" data-menuname="Main menu">
											<li class="menu-item float-right">
												<a href="{{route('healps')}}" class="link-term mercado-item-title">Help</a>
											</li>
											<li class="menu-item float-right">
												<a href="{{route('merchent.dashboard')}}" class="link-term mercado-item-title">Merchent Zone</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- header end  -->
	</header>