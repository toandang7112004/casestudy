@extends('admin.layouts.master')
@section('content')
<form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
  @csrf
        <div class="mb-3" >
          <label  class="form-label">Name</label>
          <input type="text" class="form-control" name="name">
        </div>
        <div class="mb-3" >
          <label  class="form-label">Price</label>
          <input type="text" class="form-control" name="price">
        </div>
        <div class="mb-3" >
            <select name="category_id" id="">
                @foreach( $categories as $category)
                <option value="{{ $category->id }}">
                    <td colspan="4">{{ $category->name }}</td>
                </option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
          <label class="form-label">image</label>
          <input type="file" class="form-control" name="image">
        </div>

        <button type="submit" class="btn btn-primary" >Submit</button>
        <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
</form>
@endsection