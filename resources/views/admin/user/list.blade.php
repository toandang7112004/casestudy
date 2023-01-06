@extends('admin.layouts.master')
@section('content')
    <table class="table">
        <a href="{{ route('users.create') }}" class="btn btn-primary">Thêm mới</a>
        <a href="{{ route('users.Garbagecan') }}" class="btn btn-danger">Thùng rác</a>
        <thead>
            <tr>
                <th colspan="1">ID</th>
                <th colspan="1">Tên</th>
                <th colspan="1">Email</th>
                <th colspan="1">Hoạt Động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
                <tr>
                    <th colspan="1">{{ ++$key }}</th>
                    <td colspan="1">{{ $user->name }}</td>
                    <td colspan="1">{{ $user->email }}</td>
                    <td colspan="1">
                        <form action="{{ route('users.delete',[$user->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Bạn có chắc chắn xóa không?');"
                                class="btn btn-danger">Xóa</button>
                            <a href="{{ route('users.edit',[$user->id]) }}" class="btn btn-info">Edit</a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
