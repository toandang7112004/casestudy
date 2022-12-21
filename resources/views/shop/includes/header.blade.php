<header class="header trans_300">

    <!-- Main Navigation -->

    <div class="main_nav_container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-right">
                    <div class="logo_container">
                        <a href="#">DT<span>shop</span></a>
                    </div>
                    <nav class="navbar">
                        <ul class="navbar_user">
                            <li class="checkout">
                                <a href="{{ route('shop.build') }}">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span id="checkout_items" class="checkout_items"></span>
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
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Quản Lí Tài Khoản</a>
                              <a class="dropdown-item" href="{{ route('logoutshop') }}">Đăng Xuất</a>
                            </div>
                          </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    
    
</header>