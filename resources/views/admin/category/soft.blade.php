@extends('admin.layouts.master')
@section('content')
    <table class="table">
        <a href="{{ route('categories.index') }}" class="btn btn-info">Back</a>
        <h1 style="color:rgb(110, 41, 41)">Danh sách đã xóa </h1>
        <thead>
            <tr>
                <th colspan="4">ID</th>
                <th colspan="4">Tên</th>
                <th colspan="4">Hoạt động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($softs as $key => $soft)
                <tr>
                    <th colspan="4">{{ ++$key }}</th>
                    <td colspan="4">{{ $soft->name }}</td>
                    <td>
                        @if (Auth::user()->hasPermission('Category_forceDelete'))
                            <a href="{{ route('categories.deleteforever', [$soft->id]) }}" class="btn btn-secondary">Xóa vĩnh
                                viễn</a>
                        @endif
                        @if (Auth::user()->hasPermission('Category_restore'))
                            <a href="{{ route('categories.restore', [$soft->id]) }}" class="btn btn-warning">Khôi phục</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
