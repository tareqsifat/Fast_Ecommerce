<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@if(isset($settings->title)) {{$settings->title}} @else {{config('app.name')}} @endif @if(! request()->is('/')) | @yield('title') @endif</title>
	<meta name="title" content="@yield('title')">
	<meta name="description" content="@yield('description')">
	<meta http-equiv="X-UA-Compatible" content="IE=7">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{csrf_token()}}">
	<link rel="shortcut icon" type="image/x-icon" href='@if(isset($settings->favicon)){{asset("uploads/favicon/$settings->favicon")}} @else {{asset("front/firstdeals.png")}} @endif'>
	<!-- Open Graph / Facebook -->
	@yield('og_meta')
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<!-- <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,400;1,700&family=Nunito+Sans:wght@200;300;400;600;700;800;900&family=Open+Sans:ital,wght@0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet"> -->
	<link href="https://fonts.googleapis.com/css2?family=Lato&family=Montserrat&family=Nunito&family=Open+Sans&family=Poppins&family=Roboto&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{asset('front/css/animate.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('front/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('front/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('front/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('front/css/flexslider.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('front/css/chosen.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('front/css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('front/css/color-01.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('front/css/slider.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('front/plugins/toast-plugin/css/jquery.toast.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('front/css/custom.css')}}">
	<link href="{{ asset('admin/assets/css/icons.css')}}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="{{asset('front/css/responsive.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('front/css/toster.min.css')}}">

	@yield('cssStyles')
	@livewire('front.partials.styles')
	@stack('styles')
	@livewireStyles
</head>

<body class="home-page home-01" style="background-color: #F7F8FA;">
	<!-- mobile menu -->
	<div class="mercado-clone-wrap">
		<div class="mercado-panels-actions-wrap">
			<a class="mercado-close-btn mercado-close-panels" href="#">x</a>
		</div>
		<div class="mercado-panels"></div>
	</div>
	@livewire('front.inc.mbl-floating-footer')
	<!--header-->
	@livewire('front.includes.cart.my-cart')
	@livewire('front.inc.header')
	<!-- header end  -->
	<!-- main section start  -->
	<main id="main">
		{{ $slot }}
		<!-- container  -->
	</main>
	<!-- footer start  -->
	@livewire('front.inc.footer')
	@livewireScripts
	<script src="{{asset('front/js/jquery-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
	<script src="{{asset('front/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
	<script src="{{asset('front/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('front/js/jquery.flexslider.js')}}"></script>
	<script src="{{asset('front/js/chosen.jquery.min.js')}}"></script>
	<script src="{{asset('front/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('front/js/jquery.countdown.min.js')}}"></script>
	<script src="{{asset('front/js/jquery.sticky.js')}}"></script>
	<script src="{{asset('front/js/functions.js')}}"></script>
	<script src="{{asset('front/plugins/toast-plugin/js/jquery.toast.js')}}"></script>
	<script src="{{asset('front/js/main.js')}}"></script>
	<script src="{{asset('front/js/ajax.js')}}"></script>
	<script src="{{asset('front/js/toster.min.js')}}"></script>
	@stack('scripts')

	<script>
		//  tostermessage  
		window.addEventListener('successalert', event => {
			$.toast({
				heading: 'Success',
				text: event.detail.success,
				showHideTransition: 'plain',
				icon: 'success',
				// loader: false,
				loaderBg: '#369038',
				// position: 'bottom-left',
				// hideAfter: 50000, // in milli seconds
				position: {
					bottom: 50,
					left: 0
				},
			})
		});
		window.addEventListener('warningalert', event => {
			$.toast({
				heading: 'Warning',
				text: event.detail.success,
				showHideTransition: 'slide',
				icon: 'warning',
				bgColor: '#ca850e',
				loaderBg: '#ca850e',
				position: 'bottom-left',
			})
		});
		window.addEventListener('erroralert', event => {
			$.toast({
				heading: 'Error',
				text: event.detail.success,
				showHideTransition: 'slide',
				icon: 'error',
				loaderBg: '#a91e1b',
				position: 'bottom-left',
			})
		});
		window.addEventListener('errorAlertCenter', event => {
			$.toast({
				heading: 'Error',
				text: event.detail.message,
				showHideTransition: 'slide',
				icon: 'error',
				loaderBg: '#a91e1b',
				position: 'top-center',
			})
		});
	</script>
	<!-- Go to www.addthis.com/dashboard to customize your tools -->
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-602578be712ec039"></script>
	<script>
		$(document).ready(function() {
			$('.slider_item').addClass("w-100")
			$('.loader').addClass("d-none")
			$('.home-category-carousel').removeClass("d-none")
		});
	</script>
</body>

</html>