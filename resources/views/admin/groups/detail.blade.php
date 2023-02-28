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
    </head>
    <style>
        .form-group {
            margin: 0px 0px 14px 27px;
        }
    </style>

    <body>
        <div class="page-container">
            <div class="main-content">
                <div class="container">
                    <section class="wrapper">
                        <div class="pagetitle">
                            <h1>Chức Vụ</h1>
                        </div>
                        <div class="page-section">
                            <form method="post" action="{{ route('group.group_detail', $group->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="card">
                                    <div class="card-body">
                                        <hr>
                                        <div class="form-group">
                                            <label for="tf1">Tên Quyền:</label> {{ $group->name }}
                                        </div><br>
                                        <div class="form-group">
                                            <input type="checkbox" id="checkAll" class="form-check-input"
                                                value="Quyền hạn">
                                            <label class="w3-button w3-blue">{{__('Cấp toàn bộ quyền') }}
                                                <br> <br>
                                                <div class="row">
                                                    @foreach ($group_names as $group_namea => $roles)
                                                        <div class="col-lg-6">
                                                            <div class="list-group-header" style="color:rgb(2, 6, 249) ;">
                                                                <br>
                                                                <h5> Nhóm: {{__($group_namea) }}</h5>
                                                            </div>
                                                            @foreach ($roles as $role)
                                                                @if ($role['name'] == 'User_adminupdatepass' && $group->name == 'Supper Admin')
                                                                    <div
                                                                        class="list-group-item d-flex justify-content-between align-items-center">
                                                                        <span
                                                                            style="color: rgb(4, 5, 5) ;">{{__($role['name']) }}</span>
                                                                        <label class="form-check form-switch">
                                                                            <input
                                                                                class="checkItem form-check-input checkItem"
                                                                                type="checkbox" id="" checked
                                                                                disabled>
                                                                            <span class="switcher-indicator"></span>
                                                                        </label>
                                                                    </div>
                                                                    @continue
                                                                @elseif($role['name'] == 'User_adminupdatepass')
                                                                    @continue
                                                                @endif
                                                                <div
                                                                    class="list-group-item d-flex justify-content-between align-items-center">
                                                                    <span
                                                                        style="color: rgb(4, 5, 5) ;">{{ __($role['name']) }}</span>
                                                                    <!-- .switcher-control -->
                                                                    <label class="form-check form-switch ">
                                                                        <input type="checkbox" @checked(in_array($role['id'], $userRoles))
                                                                            name="roles[]"
                                                                            class="checkItem form-check-input checkItem"
                                                                            value="{{ $role['id'] }}">
                                                                        <span class="switcher-indicator"></span>
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @endforeach
                                                </div>
                                        </div>
                                        <div class="form-actions">
                                            <button class="btn btn-success" type="submit">Duyệt</button>
                                            <a href="{{ route('group.index') }}" class="btn btn-danger"
                                                type="submit">Hủy</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        </main>
                        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
                        <script>
                            $('#checkAll').click(function() {
                                $(':checkbox.checkItem').prop('checked', this.checked);
                            });
                        </script>
                    </section>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
