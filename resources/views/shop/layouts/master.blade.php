<!DOCTYPE html>
<html lang="en">
<head>
<title>Shop</title>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
