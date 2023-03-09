<!DOCTYPE html>
<html lang="en">

<head>
    <title>Single Product</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Colo Shop Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('shop/styles/bootstrap4/bootstrap.min.css') }}">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('shop/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('shop/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('shop/plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" href="shop/plugins/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('shop/plugins/jquery-ui-1.12.1.custom/jquery-ui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('shop/styles/single_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('shop/styles/single_responsive.css') }}">
</head>
<style>
    textarea {
    margin: 0px 0px 0px 233px;
    }
    button.btn.btn-info {
    margin: 0px 0px 0px 420px;
    }
</style>
<body>

    <div class="super_container">

        <header class="header trans_300">

            <div class="main_nav_container">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <div class="logo_container">
                                <a href="#">DT<span>Store</span></a>
                            </div>
                            <nav class="navbar">
                                <ul class="navbar_menu">
                                    <li><a href="index.html">home</a></li>
                                    <li><a href="#">shop</a></li>
                                    <li><a href="#">blog</a></li>
                                </ul>
                                <ul class="navbar_user">
                                    <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li>
                                </ul>
                                <div class="hamburger_container">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </header>

        <div class="fs_menu_overlay"></div>
        <div class="container single_product_container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="single_product_pics">
                        <div class="row">
                            <div class="col-lg-9 image_col order-lg-2 order-1">
                                <div class="single_product_image">
                                    <div class="single_product_image_background">
                                    <img src="{{ asset('public/uploads/' . $product->image) }}" alt="" style="width: 500px">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="product_details">
                        <div class="free_delivery d-flex flex-row align-items-center justify-content-center">
                            <span class="ti-truck"></span><span>Thông Tin sản phẩm</span>
                        </div>
                        <div class="product_details_title">
                            <h3>Tên sản phẩm : {{ $product->name }}</h3>
                            <p>Mô tả sản phẩm : {{ $product->description }}</p>
                        </div>
                        
                        <div class="product_price">Giá tiền : {{ $product->price }}vnđ</div>
                        <p class="card-text text-danger">Số lượt xem: {{ $product->view_count }}</p>

                        <div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
                            <a href="{{ route('index') }}" class="btn btn-primary">Quay lại </a>
                            <div class="red_button add_to_cart_button"><a
                                    href="{{ route('add-to-cart', [$product->id]) }}">Thêm vào giỏ hàng</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <form action="{{route('shop.comment',$product->id)}}" method="post">
                        @csrf
                       
                        <i></i>
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <input type="hidden" name="customer_id" value="{{$product->customer[0]->id}}">
                            <textarea name="content" id="" cols="70" rows="5" placeholder="Nội dung bình luận"></textarea>
                            <button class="btn btn-info">Gửi Bình Luận</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('shop/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('shop/styles/bootstrap4/popper.js') }}"></script>
    <script src="{{ asset('shop/styles/bootstrap4/bootstrap.min.js') }}"></script>
    <script src="{{ asset('shop/plugins/Isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('shop/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
    <script src="{{ asset('shop/plugins/easing/easing.js') }}"></script>
    <script src="{{ asset('shop/plugins/jquery-ui-1.12.1.custom/jquery-ui.js') }}"></script>
    <script src="{{ asset('shop/js/single_custom.js') }}"></script>
</body>

</html>
