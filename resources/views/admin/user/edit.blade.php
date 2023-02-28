@extends('admin.layouts.master')
@section('content')
    <div class="page-container">
        <div class="main-content">
            <div class="container">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <div class="card">
                    <br>
                    <h2 class="offset-4">
                        Chỉnh sửa thông tin người dùng
                    </h2>
                    <br>
                    <div class="card-body">
                        <form action="{{ route('users.update', $users->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="tf1">Email<abbr name="Trường bắt buộc">*</abbr></label>
                                        <input name="email" type="text" class="form-control"
                                            value="{{ $users->email }}">
                                        <small id="" class="form-text text-muted"></small>
                                        @error('email')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <br>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="tf1">Mật Khẩu<abbr name="Trường bắt buộc">*</abbr></label>
                                        <input name="password" type="text" class="form-control" value="">
                                        <small id="" class="form-text text-muted"></small>
                                        @error('password')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                        <br>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label for="tf1">Họ Và Tên<abbr name="Trường bắt buộc">*</abbr></label>
                                        <input name="name" type="text" class="form-control"
                                            value="{{ $users->name }}">
                                        <small id="" class="form-text text-muted"></small>
                                        @error('name')
                                            <div class="text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group col-lg-4">
                                    <label class="control-label" for="flatpickr01">Chức Vụ<abbr
                                            name="Trường bắt buộc">*</abbr></label>
                                    <select name="group_id" id="" class="form-control">
                                        @foreach ($groups as $group)
                                            <option <?= $group->id == $users->group_id ? 'selected' : '' ?>
                                                value="{{ $group->id }}">
                                                {{ $group->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('group_id')
                                        <div class="text text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-actions">
                                    <br><br><br><br>
                                    <button class="btn btn-primary" type="submit">Lưu thay đổi</button>
                                    <a class="btn btn-danger" href="{{ route('users.index') }}">Hủy</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection