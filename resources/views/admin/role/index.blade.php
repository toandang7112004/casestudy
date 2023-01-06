@extends('admin.layouts.master')
@section('content')
    <table class="table">
        <a href="{{ route('roles.create') }}" class="btn btn-primary">Thêm mới</a>
        <thead>
            <tr>
                <th colspan="1">ID</th>
                <th colspan="1">Name</th>
                <th colspan="1">display_name</th>
                <th colspan="1">Hoạt Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $key => $role)
                <tr>
                    <th colspan="1">{{ ++$key }}</th>
                    <td colspan="1">{{ $role->name }}</td>
                    <td colspan="1">{{ $role->display_name }}</td>
                    <td colspan="1">
                        <form action="" method="post">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Bạn có chắc chắn xóa không?');"
                                class="btn btn-danger">Xóa</button>
                            <a href="" class="btn btn-info">Edit</a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
