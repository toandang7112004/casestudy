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
    <h2>Chi Tiết Đơn Hàng</h2>

    <div class="row">

        <!-- Kiểm tra biến $product được truyền sang từ ProductController -->
        <!-- Nếu biến $products không tồn tại thì hiển thị thông báo -->
        @if (!isset($product))
            <p class="text-danger">Không có sản phẩn nào.</p>
        @else
            <!-- Nếu biến $product tồn tại thì hiển thị sản phẩm -->
            <div class="container">
                <div class="col-12">
                    <div class="card text-left" style="width: 100%;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text text-dark">${{ $product->price }}</p>
                            <p class="card-text text-danger">Số lượt xem: {{ $product->view_count }}</p>
                            <!-- Nút XEM chuyển hướng người dùng quay lại trang danh sách sản phẩm -->
                            <a href="{{ route('index') }}" class="btn btn-primary">
                                < Quay lại </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>
</body>

</html>
