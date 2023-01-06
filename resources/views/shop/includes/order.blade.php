<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<style>
    .order-form .container {
        color: #4c4c4c;
        padding: 20px;
        box-shadow: 0 0 10px 0 rgba(0, 0, 0, .1);
    }

    .order-form-label {
        margin: 8px 0 0 0;
        font-size: 14px;
        font-weight: bold;
    }

    .order-form-input {
        width: 100%;
        padding: 8px 8px;
        border-width: 1px !important;
        border-style: solid !important;
        border-radius: 3px !important;
        font-family: 'Open Sans', sans-serif;
        font-size: 14px;
        font-weight: normal;
        font-style: normal;
        line-height: 1.2em;
        background-color: transparent;
        border-color: #cccccc;
    }

    .btn-submit:hover {
        background-color: #090909 !important;
    }
</style>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <section class="order-form my-4 mx-4">
        <div class="container pt-4">
            <form action="{{ route('saveorder') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-center">Điền Thông Tin Gửi Hàng</h1>
                        <hr class="mt-1">
                    </div>
                    <div class="col-12">
                        <div class="row mx-4">
                            <div class="col-12 mb-2">
                                <label class="order-form-label">Họ Và Tên</label>
                                <input type="text" name="name" class="order-form-input"
                                    value="{{ auth()->guard('customers')->user()->name }}" placeholder="Họ Và Tên">
                            </div>
                        </div>
                        <div class="row mt-3 mx-4">
                            <div class="col-12">
                                <label class="order-form-label">Thông Tin</label>
                            </div>
                            <div class="col-12 col-sm-6 mt-2 pr-sm-2">
                                <input class="order-form-input" name="email"
                                    value="{{ auth()->guard('customers')->user()->email }}" placeholder="Email">
                            </div>
                            <div class="col-12 col-sm-6 mt-2 pl-sm-0">
                                <input class="order-form-input" name="address"
                                    value="{{ auth()->guard('customers')->user()->address }}" placeholder="Địa chỉ">
                            </div>
                            <div class="col-12 col-sm-6 mt-2 pr-sm-2">
                                <label class="order-form-label">Tổng số lượng </label>
                                <input class="order-form-input" name="quantity"
                                    value="{{ session()->get('quantity')}}">
                            </div>
                            <label class="order-form-label">Tổng Tiền </label>
                            <div class="col-12 col-sm-6 mt-2 pl-sm-0">
                                <input class="order-form-input" name="totalmoney"
                                    value="{{ session()->get('totalprice') }}" >
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <input type="submit" value="Submit" class="btn btn-dark d-block mx-auto btn-submit">
                            </div>
                        </div>
                        <table style="border:solid">
                            <div class="col-6">
                                <div class="row mt-3 mx-4">
                                    <label for="">*Sản Phẩm Đã Mua</label>
                                    <?php $quantity = 0; ?>
                                    @foreach (session('cart') as $id => $details)
                                        <h6>-{{ $details['name'] }}
                                            <p>-Số lượng : {{ $details['quantity'] }}</p>
                                            <?php $quantity += $details['quantity'];
                                            session()->put('quantity', $quantity);
                                            // dd(session()->get('quantity'));
                                            ?>
                                        </h6>
                                        @endforeach
                                    <label>
                                        <input type="hidden" name="totalAll">
                                        <p>{{ session()->get('totalprice') }}</p>
                                    </label>
                                </div>
                            </div>
                        </table>
                    </div>
            </form>


            <div>
            </div>

        </div>
    </section>
</body>

</html>
