@extends('admin.layouts.master')
@section('content')
    @include('sweetalert::alert')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Thùng rác</title>
    </head>

    <body>
        <div class="page-container">
            <div class="main-content">
                <section class="section">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="card">
                                <div class="card-body">
                                    <br>
                                    <h2 class="offset-4">
                                        Thùng Rác
                                    </h2>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">STT</th>
                                                <th scope="col">Tên</th>
                                                <th scope="col">Hiện</th>
                                                <th scope="col">Tùy Chọn</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($groups as $key => $group)
                                                <tr>
                                                    <th scope="row">{{ ++$key }}</th>
                                                    <td>{{ $group->name }}</td>
                                                    <<td>{{ count($group->users) }} Người</td>
                                                        <td>
                                                            <form action="{{ route('group.forcedelete', $group->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                @if (Auth::user()->hasPermission('Group_restore'))
                                                                    <a href="{{ route('group.restore', $group->id) }}"
                                                                        class="btn btn-info">Khôi phục</a>
                                                                @endif
                                                                @if (Auth::user()->hasPermission('Product_forceDelete'))
                                                                    <button
                                                                        onclick="return confirm('Bạn có chắc chắn xóa không?');"
                                                                        class="btn btn-danger">Xóa</button>
                                                            </form>
                                                        </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <a href="{{ route('group.index') }}" class="btn btn-secondary">Trở lại</a>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </section>
        </div>
        </div>
    </body>

    </html>
@endsection
