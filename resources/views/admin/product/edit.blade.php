@extends('admin.layouts.master')
@section('content')
    <form action="{{ route('products.update', [$products->id]) }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{ $products->name }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="text" class="form-control" name="price" value="{{ $products->price }}">
        </div>
        <div class="mb-3">
            <select name="category_id" id="">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        <td colspan="4">{{ $category->name }}</td>
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Mô Tả</label>
            <input type="text" name="description" class="form-control" value="{{ $products->description }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Ảnh </label>
            <input type="file" class="form-control" name="image" value="{{ $products->image }}">
            <img src="{{ asset('public/uploads/' . $products->image) }}" height="100px" width="150px">
        </div>

        <div class="mb-3">
            <label>TRạng thái</label>
            <input type="checkbox" name="is_visible" value="1">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
    </form>
@endsection
