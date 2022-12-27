@extends('admin.layouts.master')
@section('content')
        <table class="table">
            <a href="{{ route('products.create') }}" class="btn btn-primary">Thêm mới</a>
            <a href="{{route('products.Garbagecan')}}" class="btn btn-danger">Thùng rác</a>
            <thead>
            <tr>
                <th colspan="1">ID</th>
                <th colspan="1">Tên</th>
                <th colspan="1">Giá</th>
                <th colspan="1">Loại</th>
                <th colspan="1"> Ảnh</th>
                <th colspan="1">Miêu Tả</th>
                <th colspan="1">Hoạt Động</th>
            </tr>
            </thead>
            <tbody>
                @foreach($categories as $key => $product)
                {{-- @php
                 dd($categories)   
                @endphp --}}
            <tr>
                <th colspan="1">{{ ++$key }}</th>
                <td colspan="1">{{ $product->name }}</td>
                <td colspan="1">{{ $product->price }}</td>
                <td colspan="1">{{ $product->category->name }}</td>
                <td>
                    <img src="{{ asset('public/uploads/' . $product->image) }}" alt=""
                        style="width: 110px">
                </td>
                <td colspan="1" >{{ $product->description }}</td>
                <td colspan="1" >
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
    {{ $products->onEachSide(3)->links() }}
@endsection