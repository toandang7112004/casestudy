@extends('admin.layouts.master')

@section('content')
        <table class="table">
            <thead>
            <tr>
                <th colspan="4">ID</th>
                <th colspan="4">Name</th>
                <th colspan="4">Address</th>
                <th colspan="4">Tổng Tiền</th>
                <th colspan="4">Tổng Sản Phẩm</th>
                <th colspan="4">Chi Tiết</th>
            </tr>
            </thead>
            <tbody>
                @foreach($orders as $key => $order)
            <tr>
                <th colspan="4">{{ ++$key }}</th>
                <th colspan="4">{{ $order->customer->name }}</th>
                <th colspan="4">{{ $order->customer->address }}</th>
                <td colspan="4">{{ $order->totalmoney }}</td>
                <td colspan="4">{{ $order->total }}</td>
                <td>
                    <a href="{{ route('order.details',[$order->id]) }}" class="btn btn-danger"> Chi tiết </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection