<!DOCTYPE html>
<html lang="en">
<head>
<title>Colo Shop</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{asset('shop/styles/bootstrap4/bootstrap.min.css')}}">
<link href="{{asset('shop/plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('shop/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('shop/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('shop/plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('shop/styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('shop/styles/respdeal_ofthe_weekonsive.css')}}">
</head>

<body>

<div class="super_container">

	<!-- Header -->
    @extends('shop.includes.header')


	{{-- main --}}
	<div class="container bt:1000">
		@yield('blog')
		@yield('content')
	</div>

	<!-- Footer -->
    @extends('shop.includes.footer')


</div>

<script src="{{asset('shop/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('shop/styles/bootstrap4/popper.js')}}"></script>
<script src="{{asset('shop/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{asset('shop/plugins/Isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('shop/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{asset('shop/plugins/easing/easing.js')}}"></script>
<script src="{{asset('shop/js/custom.js')}}"></script>
</body>

</html>
