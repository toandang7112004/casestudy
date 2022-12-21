@extends('admin.layouts.master')
@section('content')
        <table class="table">
            <a href="{{ route('products.create') }}" class="btn btn-primary">Thêm mới</a>
            <a href="{{route('products.Garbagecan')}}" class="btn btn-danger">Thùng rác</a>
            <thead>
            <tr>
                <th colspan="4">ID</th>
                <th colspan="4">Name</th>
                <th colspan="4">Price</th>
                <th colspan="4">Category_id</th>
                <th colspan="4">Image</th>
                <th colspan="4">Action</th>
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
                <td colspan="4" >
                    <form action="{{ route('products.delete',[$product->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Bạn có chắc chắn xóa không?');" class="btn btn-danger">Xóa</button>
                        <a href="{{ route('products.edit',[$product->id]) }}" class="btn btn-info">Edit</a>
                    </form>
                </td>
            </tr>
           
            @endforeach
            </tbody>
        </table>
@endsection