	<footer id="footer" class="ihuucw">
		<!-- footer start  -->
		<div class="footer-box-top py-4">
			<div class="container">
				<div class="row">
					<div class="col-xs-3 col-sm-2 col-md-2 col-lg-2">
						<div class="footer-logo-icon">
							<a href="{{route('home')}}" class="link-to-home">
								<img width="150" class="img-fluid" src='@if(isset($settings->logo)){{asset("uploads/logo/$settings->logo")}} @else {{asset("defaults/firstdeals.png")}} @endif' alt="logo"></a>
						</div>
					</div>
					<div class="col-xs-9 col-sm-5 col-md-5 col-lg-5">
						<strong class="text-uppercase font-size-14 text_white mb-3">New To {{ config("app.name")}}</strong>
						<p class="mt-3">Subscribe Our newsletter to get updates on our latest offers!</p>
						<form wire:submit.prevent="save">
							@if($errors->has('email')) <span class="text_danger font-size-16">{{$errors->first('email')}}</span> <br>@endif
							<div class="form-group d-flex">
								<input class="form-control" wire:model="email" placeholder="Enter Your Email Address" type="email" required>
								<button class="text-uppercase ml-1 btn btn-outline-dark">Submit<span wire:loading wire:target="save">ing...</span></button>
							</div>
						</form>
					</div>
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
						<div class="wrap-footer-item">
							<div class="app_heading">
								<strong class="text-uppercase font-size-14 text_white">Download {{config('app.name')}} Free App</strong>
								<p>Get access to exclusive offers!</p>
							</div>
							<div class="item-content">
								<div class="wrap-list-item apps-list">
									<ul>
										<li><a target="_blank" href="{{$datas->appstore}}" class="link-to-item" title="our application on apple store">
												<figure class="footer-app-img p-1"><img class="" src="{{asset('defaults/app-store.png')}}" alt="apple store" style="height: 30px;" width="128"></figure>
											</a></li>
										<li><a target="_blank" href="{{$datas->playstore}}" class="link-to-item" title="our application on google play store">
												<figure class="footer-app-img p-1"> <img class="" src="{{asset('defaults/googleplay.png')}}" alt="google play store" style="height: 30px;" width="128"></figure>
											</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="wrap-footer-content footer-style-1">
			<div class="main-footer-content">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 col-sm-12 col-md-4 col-xs-12">
							<div class="wrap-footer-item">
								<h3 class="item-header">@if(!empty($datas->title)) {{$datas->title}} @else {{config('app.name')}} @endif</h3>
								<div class="item-content">
									<div class="wrap-contact-detail">
										<p style="text-align: justify;">{{$datas->sitedescription}}</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-8 col-sm-12 col-md-8 col-xs-12">
							<div class="wrap_footer_content">
								<div class="wrap-footer-item">
									<h3 class="item-header">My Account</h3>
									<div class="item-content">
										<div class="wrap-vertical-nav footer-list-item">
											<ul>
												<li class="menu-item"><a href="{{route('user.profile')}}" class="link-term">My Account</a></li>
												<li class="menu-item"><a href="{{route('brands')}}" class="link-term">Brands</a></li>
												<li class="menu-item"><a href="{{route('front.trake-order')}}" class="link-term">Track Order</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="wrap-footer-item">
									<h3 class="item-header">Infomation</h3>
									<div class="item-content">
										<div class="wrap-vertical-nav footer-list-item">
											<ul>
												<li class="menu-item"><a href="{{route('contactus')}}" class="link-term">Contact Us</a></li>
												<li class="menu-item"><a href="{{route('returnPolicy')}}" class="link-term">Returns</a></li>
												<li class="menu-item"><a href="{{route('user.orders-history')}}" class="link-term">Order History</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="wrap-footer-item">
									<h3 class="item-header res_item_heading">Contact Details</h3>
									<div class="item-content">
										<div class="item-content">
											<div class="wrap-vertical-nav footer-list-item">
												<ul class="">
													<li class="menu-item">
														<div class="d-flex content_info_menue_item">
															<i class="fa fa-map-marker px-3 py-2" aria-hidden="true"></i>
															<p class="contact-txt text-align-center">{{$datas->address}}</p>
														</div>
													</li>
													<li class="menu-item">
														<div class="d-flex content_info_menue_item">
															<i class="fa fa-phone p-3" aria-hidden="true"></i>
															<p class="contact-txt"><a class="coloraaa" href="tel:+{{$datas->phone}}">{{$datas->phone}}</a></p>
														</div>
													</li>
													<li class="menu-item">
														<div class="d-flex content_info_menue_item">
															<i class="fa fa-envelope p-3" aria-hidden="true"></i>
															<p class="contact-txt"><a class="coloraaa" href="mailto:{{$datas->email}}">{{$datas->email}}</a></p>
														</div>
													</li>

												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="footer_bottom mb-4">
						<div class="w-100 row m-auto">
							@if($social->count()>0)
							<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
								<div class="wrap-footer-item">
									<h3 class="item-header">Join us</h3>
									<!-- <h5 class="item-header">Social network</h5> -->
									<div class="item-content">
										<div class="wrap-list-item social-network">
											<ul class="w-100 m-auto">
												@foreach($social as $sdata)
												<li class="mr-3"><a href="{{$sdata->url}}" target="_blank" class="link-to-item" title="{{$sdata->url}}"><i class="{{$sdata->icon}}" aria-hidden="true"></i></a></li>
												@endforeach
											</ul>
										</div>
									</div>
								</div>
							</div>
							@endif
							@if($paymentImage->count()>0)
							<div class="col-lg-9 col-sm-9 col-md-9 col-xs-12">
								<div class="wrap-footer-item">
									<h3 class="item-header">Payment Methodes & Delivary Partners</h3>
									<!-- <h5 class="item-header">Social network</h5> -->
									<div class="item-content">
										<div class="wrap-list-item social-network">
											<ul class="w-100 m-auto">
												@foreach($paymentImage as $sdata)
												<li class="mr-3"><img width="45" src='{{asset("uploads/payment/$sdata->image")}}' alt="{{$sdata->title}}"></li>
												@endforeach
											</ul>
										</div>
									</div>
								</div>
							</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="coppy-right-box copyrights">
			<div class="container border_top_f5f5">
				<div class="coppy-right-item item-left">
					<p class="coppy-right-text">{{$datas->copyright}}</p>
				</div>
				<div class="coppy-right-item item-right">
					<div class="wrap-nav horizontal-nav">
						<ul>
							<li class="menu-item"><a href="{{route('aboutus')}}" class="link-term">About us</a></li>
							<li class="menu-item"><a href="{{route('privacyPolicy')}}" class="link-term">Privacy Policy</a>
							</li>
							<li class="menu-item"><a href="{{route('termsAndConditions')}}" class="link-term">Terms &Conditions</a></li>
							<li class="menu-item"><a href="{{route('returnPolicy')}}" class="link-term">Return Policy</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</footer>