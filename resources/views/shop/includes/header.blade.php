<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>

<header class="header trans_300">

    <!-- Main Navigation -->

    <div class="main_nav_container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-right">
                    <div class="logo_container">
                        <a href="#">DT<span>Store</span></a>
                    </div>
                    <nav class="navbar">
                        <ul class="navbar_user">
                            <li class="checkout">
                                <a href="{{ route('show.cart') }}">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span id="checkout_items" class="checkout_items">{{ count((array) session('cart')) }}</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar_menu">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Shop</a></li>
                            <li><a href="#">blog</a></li>
                        </ul>
                        <div class="dropdown">
                            <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <a href="#"><i class="fa fa-user" aria-hidden="true"></i></a>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                              <a class="dropdown-item" class="bi bi-android">
                                  @if (isset(auth()->guard('customers')->user()->name))
                                  <i class="bi bi-android">{{Auth()->guard('customers')->user()->name}}</i>
                                @endif
                              </a>
                              <a class="dropdown-item" href="#">Quản Lí Tài Khoản</a>
                              <a class="dropdown-item" href="{{ route('formregistershop') }}">Đăng Xuất</a>
                            </div>
                          </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    
</header>
</html>
