@extends('admin.layouts.master')
@section('content')
    <form method="post" action="{{ route('settied') }}">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        @if (session('status1'))
            <div class="alert alert-danger" role="alert">
                {{ session('status1') }}
            </div>
        @endif
        @csrf
        <div class="mb-3">
            <label class="form-label">Password new</label>
            <input type="text" name="password" class="form-control">
        </div>
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="change_password" id="exampleCheck1">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
