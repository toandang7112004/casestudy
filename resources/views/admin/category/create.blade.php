@extends('admin.layouts.master')
@section('content')
{{-- @if (('error'))
    <p class="text-danger">
    </p>
@endif --}}
<form action="{{ route('categories.store') }}" method="post">
  @csrf
        <div class="mb-3" >
          <label  class="form-label">Name</label>
          <input type="text" class="form-control" name="name">
        </div>
        @error('name')
            <div class="alert alert-danger">{{ $message}}</div>
        @enderror
        <button type="submit" class="btn btn-primary" >Submit</button>
        <a href="{{ route('categories.index') }}" class="btn btn-primary">Back</a>
</form>
@endsection