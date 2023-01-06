@extends('admin.layouts.master')

@section('content')
        <table class="table">
            <thead>
            <tr>
                <th colspan="4">ID</th>
                <th colspan="4">Giá Tiền</th>
                <th colspan="4">Số Lượng</th>
                <th colspan="4">Mô tả</th>
                <th colspan="4">Tên Sản Phẩm</th>
                <th colspan="4">Ảnh</th>
            </tr>
            </thead>
            <tbody>
                @foreach($items as $key => $item)
            <tr>
                <th colspan="4">{{ ++$key }}</th>
                <th colspan="4">{{ $item->price}}</th>
                <th colspan="4">{{ $item->quantity }}</th>
                <td colspan="4">{{ $item->description }}</td>
                <td colspan="4">{{ $item->name }}</td>
                <td>
                  <img src="{{ asset('public/uploads/' . $item->image) }}" alt=""
                      style="width: 110px">
              </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection