@extends('admin.layouts.master')
@section('content')
    @include('sweetalert::alert')
    <table class="table">
        @if (Auth::user()->hasPermission('Category_create'))
            <a href="{{ route('categories.create') }}" class="btn btn-primary">Thêm mới</a>
            <a href="{{ route('categories.Garbagecan') }}" class="btn btn-danger">Thùng rác</a>
        @endif
        <thead>
            <tr>
                <th colspan="4">ID</th>
                <th colspan="4">Tên</th>
                <th colspan="4">Hoạt động</th>
            </tr>
        </thead>
        <tbody>
            @if (Auth::user()->hasPermission('Category_viewAny'))
                @foreach ($categories as $key => $category)
                    <tr>
                        <th colspan="4">{{ ++$key }}</th>
                        <td colspan="4">{{ $category->name }}</td>
                        <td colspan="4">
                            <form action="{{ route('categories.delete', [$category->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                @if (Auth::user()->hasPermission('Category_delete'))
                                    <button onclick="return confirm('Bạn có chắc chắn xóa không?');"
                                        class="btn btn-danger">Xóa</button>
                                @endif
                                @if (Auth::user()->hasPermission('Category_update'))
                                    <a href="{{ route('categories.edit', [$category->id]) }}" class="btn btn-info">Chỉnh
                                        sửa</a>
                                @endif
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{ $categories->onEachSide(3)->links() }}
@endsection
