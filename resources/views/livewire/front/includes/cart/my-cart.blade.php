<div id="cart_widgate" class="w-100 bgf5 cart-wraper-content visibility-hidden" wire:ignore.self>
	<div id="cart_wraper_visible" class="cart-wraper bgf5 border-f5f5" wire:ignore.self>
		<button id="dimisable_cart_widgate" class="cartdismissabel font-size-18 border_none bgffffff font-size-16" type="button"><span class="font-weight-bold" aria-hidden="true">&times;</span></button>
		<span class="my-cart font-weight-bold pr-3">My Cart</span>
		@if(Cart::instance('cartProduct')->count()>0)
		<div class="p-3 main-content-area position-relative">
			<div class="wrap-iten-in-cart">
				<h3 class="box-title">Products</h3>

				<ul id="mycart_scroll_section" class="products-cart cart-scroll mb-1 ">
					<style>
						#mycart_scroll_section {
							overflow-y: scroll !important;
							height: 350px !important;
						}

						@media (min-width: 1200px) {
							#mycart_scroll_section {
								overflow-y: scroll !important;
								height: 500px !important;
							}
						}

						@media (min-width: 1600px) {
							#mycart_scroll_section {
								overflow-y: scroll !important;
								height: 600px !important;
							}
						}

						@media (min-width: 2100px) {
							#mycart_scroll_section {
								overflow-y: scroll !important;
								height: 700px !important;
							}
						}

						.cart-scroll::-webkit-scrollbar {
							width: 1px;
						}
					</style>

					@foreach(Cart::instance('cartProduct')->content() as $key => $cItem)
					<li class="myChartItems">
						<div class="row d-flex">
							<div class="col-sm-2 col-xsm-2">
								<div class="product-image">
									<figure><img src='{{asset("uploads/products/thumbnails/")}}/{{$cItem->model->thumbnail}}' alt="{{$cItem->model->thumbnail}}"></figure>
								</div>
							</div>
							<div class="col-sm-10 col-xsm-10">
								<div class="row">
									<div class="col-sm-12 col-xsm-12 px-0">
										<div class="product-name">
											<a class="link-to-product" href="{{route('single',$cItem->model->slug)}}">{{Str::limit($cItem->model->title,40)}}</a>
										</div>
									</div>
								</div>
								<div class="row mt-2">
									<div class="col-sm-12 col-xsm-12 col-md-12 col-lg-12 mr-2">
										<table class="w-100">
											<tr class="rowparent">
												<td width="48%">
													<div class="produtc-price">
														<p class="price">৳ {{$cItem->price}}</p>
													</div>
												</td>
												<td width="48%">
													<div class="cart_quantity  mx-2">
														<div class="cart-quantity-input ml-4 d-flex">
															<button wire:click.prevent="decrimentQty('{{$cItem->rowId}}')" class=""><i class="fa fa-minus"></i></button>
															<button desabled class="btn-desabled">{{$cItem->qty}}</button>
															<button wire:click.prevent="incrimentQty('{{$cItem->rowId}}')"><i class="fa fa-plus"></i></button>
														</div>
													</div>
												</td>
												<td width="4%" class="del_cart_item">
													<div class="pl-4 ml-5">
														<button wire:click.prevent="removeItem('{{$cItem->rowId}}')"><i class="fa fa-trash text-dark" aria-hidden="true"></i></button>

													</div>
												</td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
					</li>
					@endforeach
				</ul>
			</div>
			<div class="summary summary_Item ajax_del_cal">
				<div class="order-summary">
					<h4 class="title-box mb-1 pb-1">Order Details</h4>
					<p class="summary-info"><span class="title">Subtotal</span><b class="index totalCart">৳ {{Cart::subtotal()}}</b></p>
					<p class="summary-info total-info mt-0 mb-3 pt-0"><span class="title">Total</span><b class="index totalCart">৳ {{Cart::subtotal()}}</b></p>
				</div>
				<div class="checkout-info">
					<a class="py-3 btn border_redious btn-block btn-checkout" href="{{route('user.cart')}}">Check out</a>
				</div>
			</div>
		</div>
		<!--end main content area-->
		@else
		<span class="position-absolute Cart_empty_text"><i>Empty</i></span>
		@endif
	</div>
	<div class="content_opacity"></div>
	<style>
		.content_opacity {
			height: 1000%;
			width: 100%;
			content: "";
			background: #f7f7f700;
		}
	</style>
</div>