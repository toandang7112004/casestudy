@extends('shop.layouts.master')
@section('content')
    <style>
        .super_container {
            padding: 179px 0px 84px 16px;
        }
    </style>
    <div class="container">
        <div class="container page">
            <table id="cart" class="table table-hover table-condensed">
                <h1 class="text-center">Giỏ Hàng </h1>
                <thead>
                    <tr>
                        <th style="width:40%">Tên sản phẩm</th>
                        <th style="width:15%">Giá 1 sản phẩm</th>
                        <th style="width:8%">Số lượng</th>
                        <th style="width:22%" class="text-center">Tổng tiền</th>
                        <th style="width:15%">Hoạt động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    @if (session('cart'))
                        @foreach (session('cart') as $id => $details)
                            <?php $total += $details['price'] * $details['quantity'];
                            session()->put('totalprice', $total);
                            session()->put('name', $details['name']);
                            session()->put('quantity', $details['quantity']);
                            session()->put('price', $details['price']);
                            ?>
                            <tr>
                                <td data-th="Product">
                                    <div class="row">
                                        <div class="col-sm-3 hidden-xs"><img
                                                src="{{ asset('public/uploads/' . $details['image']) }}" width="100"
                                                height="100" class="img-responsive" /></div>
                                        <div class="col-sm-9">
                                            <h4 class="nomargin">{{ $details['name'] }}</h4>
                                        </div>
                                    </div>
                                </td>
                                <td data-th="Price">${{ $details['price'] }}</td>
                                <td data-th="Quantity">
                                    <input type="number" value="{{ $details['quantity'] }}"
                                        class="form-control quantity" />
                                </td>
                                <td data-th="Subtotal" class="text-center">{{ $details['price'] * $details['quantity'] }}đ
                                </td>
                                <td class="actions" data-th="">
                                    <button class="update-cart" data-id="{{ $id }}"><i
                                            class="fa fa-refresh"></i></button>
                                    <button class="remove-from-cart" data-id="{{ $id }}"><i
                                            class="fa fa-trash-o"></i></button>
                                </td>

                            </tr>
                        @endforeach
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <td><a href="{{ route('shop.index') }}" class="btn btn-danger"><i class="fa fa-angle-left"></i>
                                Trở về</a>
                            <a href="{{ route('formorder') }}" class="btn btn-dark"><i class="fa fa-angle-right"></i>
                                Thanh Toán</a>
                        </td>
                        <td colspan="2" class="hidden-xs"></td>
                        <td class="hidden-xs text-center"><strong>Tổng : ${{ $total }}</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <script type="text/javascript">
            $(".update-cart").click(function(e) {
                e.preventDefault();
                var ele = $(this);
                $.ajax({
                    url: '{{ url('update-cart') }}',
                    method: "patch",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.attr("data-id"),
                        quantity: ele.parents("tr").find(".quantity").val()
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            });
            $(".remove-from-cart").click(function(e) {
                e.preventDefault();
                var ele = $(this);
                if (confirm("Are you sure")) {
                    $.ajax({
                        url: '{{ url('remove-from-cart') }}',
                        method: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: ele.attr("data-id")
                        },
                        success: function(response) {
                            window.location.reload();
                        }
                    });
                }
            });
        </script>
    </div>
@endsection
