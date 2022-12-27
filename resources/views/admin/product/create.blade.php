@extends('admin.layouts.master')
@section('content')
    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tên</label>
            <input type="text" class="form-control" name="name">
        </div>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label class="form-label">Giá</label>
            <input type="text" class="form-control" name="price">
        </div>
        @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <select name="category_id" id="">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        <td colspan="4">{{ $category->name }}</td>
                    </option>
                @endforeach
                @error('category_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Mô Tả</label>
            <input type="text" name="description" class="form-control">
        </div>
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <div class="mb-3">
            <label class="form-label">Ảnh</label>
            <input type="file" class="form-control" name="image">
        </div>
        @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
    </form>
@endsection
