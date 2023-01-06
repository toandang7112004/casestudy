@extends('admin.layouts.master')
@section('content')
    <table class="table">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if (session('status1'))
            <div class="alert alert-danger" role="alert">
                {{ session('status1') }}
            </div>
        @endif
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Thêm mới</a>
            
        <a href="{{ route('categories.export') }}" class="btn btn-success">Xuất excel</a>
        <a href="{{ route('categories.Garbagecan') }}" class="btn btn-danger">Thùng rác</a>
        <thead>
            <tr>
                <th colspan="4">ID</th>
                <th colspan="4">Name</th>
                <th colspan="4">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $key => $category)
                <tr>
                    <th colspan="4">{{ ++$key }}</th>
                    <td colspan="4">{{ $category->name }}</td>
                    <td colspan="4">
                        <form action="{{ route('categories.delete', [$category->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Bạn có chắc chắn xóa không?');"
                                class="btn btn-danger">Xóa</button>
                            <a href="{{ route('categories.edit', [$category->id]) }}" class="btn btn-info">Edit</a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categories->onEachSide(3)->links() }}
@endsection
