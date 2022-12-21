@extends('admin.layouts.master')
@section('content')
<form action="{{ route('categories.update',[$categories->id]) }}" method="post">
  @csrf
  @method('PUT')
        <div class="mb-3" >
          <label  class="form-label">Name</label>
          <input type="text" class="form-control" value="{{$categories->name}}" name="name">
        </div>
          @error('name')
              <div class="alert alert-danger">{{ $message}}</div>
          @enderror
        <button type="submit" class="btn btn-primary" >Submit</button>
        <a href="{{ route('categories.index') }}" class="btn btn-primary">Back</a>
</form>
@endsection