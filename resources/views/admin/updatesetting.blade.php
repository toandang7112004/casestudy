@extends('admin.layouts.master')
@section('content')
<form method="post" action="{{ route('settied') }}">
    @csrf
    <div class="mb-3">
      <label  class="form-label">Password new</label>
      <input type="text" name="password" class="form-control" >
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" name="change_password" id="exampleCheck1">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
  </form>
@endsection