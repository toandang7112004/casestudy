@extends('admin.layouts.master')
@section('content')
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tên</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">password</label>
            <input type="text" name="password" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Address</label>
            <input type="text" name="address" class="form-control">
        </div>
        <div class="mb-3">
            <label for="">Chọn vai trò</label>
            <select name="role_id[]" class="form-control" multiple>
                @foreach ($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
    </form>
@endsection
