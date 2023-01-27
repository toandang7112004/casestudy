@extends('admin.layouts.master')
@section('content')
<main class="page-content">
    <section class="wrapper">
        <div class="panel-panel-default">
            <div class="market-updates">
                <div class="container">
                    <div class="page-inner">
                        <header class="page-title-bar">
                            <nav aria-label="breadcrumb">
                                <a href="{{ route('user.index') }}" class="w3-button w3-red">Quay Lại</a>
                            </nav>
                            <h1 class="page-title">Thay đổi thông tin</h1>
                        </header>
                        <div class="page-section">
                            <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="card">
                                    <div class="card-body">
                                        <legend>Thông tin cơ bản</legend>
                                        <div class="row">

                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="tf1">Email<abbr name="Trường bắt buộc">*</abbr></label>
                                                    <input name="email" type="text" class="form-control"
                                                        value="{{ $user->email }}">
                                                    <small id="" class="form-text text-muted"></small>
                                                    @error('email')
                                                        <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="tf1">Họ Và Tên<abbr
                                                            name="Trường bắt buộc">*</abbr></label>
                                                    <input name="name" type="text" class="form-control"
                                                        value="{{ $user->name }}">
                                                    <small id="" class="form-text text-muted"></small>
                                                    @error('name')
                                                        <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                @if (Auth::user()->hasPermission('Group_update'))
                                                <label class="control-label" for="flatpickr01">Chức Vụ<abbr
                                                        name="Trường bắt buộc">*</abbr></label>
                                                <select name="group_id" id="" class="form-control">
                                                    <option value="">--Vui lòng chọn--</option>
                                                    @foreach ($groups as $group)
                                                    <option
                                                        <?= $group->id == $user->group_id ? 'selected' : '' ?>
                                                        value="{{ $group->id }}">
                                                        {{ $group->name }}</option>
                                                @endforeach
                                                </select>
                                                @if ('group_id')
                                                    <p style="color:red">{{ $errors->first('group_id') }}</p>
                                                @endif
                                                @endif
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="tf1">Địa chỉ<abbr
                                                            name="Trường bắt buộc">*</abbr></label> <input name="address"
                                                        type="text" class="form-control" value="{{ $user->address }}">
                                                    <small id="" class="form-text text-muted"></small>
                                                    @error('address')
                                                        <div class="text text-danger">{{ $message }}</div>
                                                    @enderror
                                                    <br>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-actions">
                                            <br><br><br><br>
                                            <button class="w3-button w3-blue" type="submit">Lưu thay đổi</button>
                                            <a class="w3-button w3-red" href="{{ route('user.index') }}">Hủy</a>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection