<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    @include('sweetalert::alert')
</body>

<header class="header trans_300">

    <div class="main_nav_container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-right">
                    <div class="logo_container">
                        <a href="{{ route('shop.index') }}">DT<span>Store</span></a>
                    </div>
                    <nav class="navbar">
                        <div class="navbar-form navbar-left" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control input-search-ajax" id="">
                            </div>
                            <div class="search-ajax-result">
                            </div>
                        </div>
                        <ul class="navbar_user">
                            <li class="checkout">
                                <a href="{{ route('show.cart') }}">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <span id="checkout_items"
                                        class="checkout_items">{{ count((array) session('cart')) }}</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar_menu">
                            <li><a href="{{ route('shop.index') }}">Home</a></li>
                            @if (isset(auth()->guard('customers')->user()->name))
                                <li><a href="#"><span style="color:red" >Xin chào : </span>{{ auth()->guard('customers')->user()->name}}</a></li>
                                <li><a href="{{ route('formloginshop') }}">Đăng xuất</a></li>
                            @else
                                <li><a href="{{ route('formloginshop') }}">Đăng Nhập</a></li>
                                <li><a href="{{ route('formregistershop') }}">Đăng Kí</a></li>
                            @endif
                        </ul>
                    </nav>
</header>
<script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>
<script>
    $('.input-search-ajax').keydown(function() {
        var text = $(this).val();
        $.ajax({
            url: "{{ route('ajax-search-products') }}?key=" + text,
            type: 'GET',
            success: function(res) {
                var _html = '';
                for (var pro of res) {
                    _html += '<div class="media">';
                    _html +=
                        '<img src="http://localhost/casestudymd3/casestudy/public/public/uploads/' +
                        pro.image + '" class="media-object" width="50">';
                    _html += '<div class="media-body">';
                    _html += '<h4 class="media-heading"><a href="">' + pro.name + '</a></h4>';
                    _html += '</div>';
                    _html += '</div>';
                }
                $('.search-ajax-result').html(_html)
            }
        });

    })
</script>

</html>
