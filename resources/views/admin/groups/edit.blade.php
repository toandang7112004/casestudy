@extends('admin.layouts.master')
@section('content')
@include('sweetalert::alert')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="page-container">
        <div class="main-content">
            <div class="container">
                <section class="section">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <br>
                                    <h2 class="offset-4">
                                        Chỉnh Sửa Nhóm Quyền
                                    </h2>
                                    <br>
                                    <form action="{{ route('group.update', [$group->id]) }}" method="post">
                                        @method('put')
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="inputText" class="col-sm-2 col-form-label">Tên Loại Sản
                                                Phẩm</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="name" value="{{ $group->name }}"
                                                    placeholder="Nhập Tên Loại Sản Phẩm" class="form-control">
                                                @error('name')
                                                    <div class="text text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row mb-3">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Sửa</button>
                                                <a href="{{ route('group.index') }}" class="btn btn-danger">Hủy</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    @endsection

</body>

</html>
