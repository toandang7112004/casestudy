@extends('admin.layouts.master')

@section('content')
        <table class="table">
            <thead>
            <tr>
                <th colspan="4">ID</th>
                <th colspan="4">Tên</th>
                <th colspan="4">Tổng tiền</th>
                <th colspan="4">Ngày mua</th>
                <th colspan="4">Chi Tiết</th>
            </tr>
            </thead>
            <tbody>
                @foreach($orders as $key => $order)
            <tr>
                <th colspan="4">{{ ++$key }}</th>
                <th colspan="4">{{ $order->customer->name }}</th>
                <td colspan="4">{{ $order->total }}</td>
                <td colspan="4">{{ $order->created_at }}</td>
                <td>
                    <a href="{{ route('order.show',[$order->id]) }}" class="btn btn-danger"> Chi tiết</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection