@extends('admin.layouts.master')
@section('content')
        <table class="table">
            <h1 style="color:rgb(110, 41, 41)" >Danh sách Tìm kiếm </h1>
            <thead>
            <tr>
                <th colspan="4">ID</th>
                <th colspan="4">Name</th>
                <th colspan="4">Price</th>
                <th colspan="4">Category_id</th>
                <th colspan="4">Image</th>
            </tr>
            </thead>
            <tbody>
                @foreach($products as $key => $product)
            <tr>
                <th colspan="4">{{ ++$key }}</th>
                <td colspan="4">{{ $product->name }}</td>
                <td colspan="4">{{ $product->price }}</td>
                <td colspan="4">{{ $product->category_id }}</td>
                <td>
                    <img src="{{ asset('public/uploads/' . $product->image) }}" alt=""
                        style="width: 110px">
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
@endsection