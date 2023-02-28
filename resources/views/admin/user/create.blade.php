@extends('admin.layouts.master')
@section('content')
    <div class="page-container">
        <div class="main-content">
            <div class="container">
                {{-- @section('content') --}}
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <section class="wrapper">
                    <div class="panel-panel-default">
                        <div class="market-updates">
                            <div class="container">
                                <div class="page-inner">
                                    <header class="page-title-bar">
                                        <h2 class="offset-4">
                                            Đăng kí tài khoản nhân viên
                                        </h2>
                                        <br>
                                    </header>
                                    <div class="page-section">
                                        <form action="{{ route('users.store') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="card">
                                                <div class="card-body">
                                                    <legend>Thông tin cơ bản</legend>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="tf1">Email<abbr
                                                                        name="Trường bắt buộc">*</abbr></label>
                                                                <input name="email" type="text"
                                                                    class="form-control" value="{{ old('email') }}">
                                                                <small id=""
                                                                    class="form-text text-muted"></small>
                                                                @error('email')
                                                                    <div class="text text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="tf1">Mật Khẩu<abbr
                                                                        name="Trường bắt buộc">*</abbr></label>
                                                                <input name="password" type="text"
                                                                    class="form-control" value="">
                                                                <small id=""
                                                                    class="form-text text-muted"></small>
                                                                @error('password')
                                                                    <div class="text text-danger">{{ $message }}</div>
                                                                @enderror
                                                                <br>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
                                                            <div class="form-group">
                                                                <label for="tf1">Họ Và Tên<abbr
                                                                        name="Trường bắt buộc">*</abbr></label>
                                                                <input name="name" type="text"
                                                                    class="form-control" value="{{ old('name') }}">
                                                                <small id=""
                                                                    class="form-text text-muted"></small>
                                                                @error('name')
                                                                    <div class="text text-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-lg-4">
                                                            <label class="control-label" for="flatpickr01">Chức Vụ<abbr
                                                                    name="Trường bắt buộc">*</abbr></label>
                                                            <select name="group_id" id="" class="form-control">
                                                                <option value="">--Vui lòng chọn--</option>
                                                                @foreach ($groups as $group)
                                                                    <option value="{{ $group->id }}">
                                                                        {{ $group->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('group_id')
                                                                <div class="text text-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-actions">
                                                        <br><br><br><br>
                                                        <button class="btn btn-primary" type="submit">Đăng
                                                            ký</button>
                                                        <a class="btn btn-danger"
                                                            href="{{ route('users.index') }}">Hủy</a>
                                                    </div>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
<script>
    jQuery(document).ready(function() {
        if ($('#blah').hide()) {
            $('#blah').hide();
        }
        jQuery('#inputFile').change(function() {
            $('#blah').show();
            const file = jQuery(this)[0].files;
            if (file[0]) {
                jQuery('#blah').attr('src', URL.createObjectURL(file[0]));
                jQuery('#blah1').attr('src', URL.createObjectURL(file[0]));
            }
        });
    });
</script>
@endsection