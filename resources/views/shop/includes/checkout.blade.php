@extends('shop.layouts.master')
@section('content')
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

        form {
            margin: 65px 0px 0px 0px;
        }

        #md-5 {
            margin: 121px 0px 0px 0px;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <div class="row">
        <div class="col-md-7">
            <section class="order-form my-4 mx-4">
                <div class="container pt-4">
                    <form action="{{ route('savecheckout') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <h2 class="text-center">Điền Thông Tin Gửi Hàng</h2>
                                <hr class="mt-1">
                            </div>
                            <div class="col-12">
                                <div class="col-12 mb-2">
                                    <div class="col-12 mb-2">
                                        <label class="order-form-label">Họ Và Tên</label>
                                        @if (isset(auth()->guard('customers')->user()->name))
                                            <input type="text" name="name" class="order-form-input"
                                                value="{{ auth()->guard('customers')->user()->name }}"
                                                placeholder="Họ Và Tên">
                                        @endif
                                    </div>
                                    <div class="col-12">
                                        <label class="order-form-label">Email</label>
                                    </div>
                                    <div class="col-12 mb-2">
                                        @if (isset(auth()->guard('customers')->user()->email))
                                            <input class="order-form-input" name="email"
                                                value="{{ auth()->guard('customers')->user()->email }}" placeholder="Email">
                                        @endif
                                    </div>
                                    <div class="col-12 mb-2">
                                        <label class="order-form-label">Địa chỉ</label>
                                        @if (isset(auth()->guard('customers')->user()->address))
                                            <input class="order-form-input" name="address"
                                                value="{{ auth()->guard('customers')->user()->address }}">
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <input type="submit" value="Submit"
                                            class="btn btn-dark d-block mx-auto btn-submit">
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </section>
        </div>
        <div class="col-md-5" id="md-5">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-dark">Giỏ hàng</span>
                <span class="badge badge-danger badge-pill">{{ count((array) session('cart')) }}</span>
            </h4>
            <ul class="list-group mb-3">
                @foreach (session('cart') as $id => $details)
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">{{ $details['name'] }}</h6>
                            <small class="text-dark">{{ $details['price'] }} x {{ $details['quantity'] }}</small>
                        </div>
                        <span class="text-dark">{{ $details['price'] * $details['quantity'] }} vnđ</span>
                    </li>
                @endforeach
                <li class="list-group-item d-flex justify-content-between">
                    <h5 style="color:rgb(243, 84, 84)">Tổng thành tiền</h5>
                    <h5 style="color:rgb(243, 84, 84)">{{ session()->get('totalprice') }} vnđ</h5>
                </li>
            </ul>
        </div>
    </div>
@endsection
