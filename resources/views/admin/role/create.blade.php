@extends('admin.layouts.master')
@section('content')
    <form action="" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Tên vai trò</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="mb-3">
            <label for="">Mô tả</label>
            <textarea name="desplay_name" id="" cols="30" rows="5" class="form-control"></textarea>
        </div>
        <div class="col-4">
                @for ($i = 0; $i < 4; $i++)
                <h5 class="card-title">
                    <label for="">
                        <input type="checkbox" name="" id="">
                    </label>
                    Thêm sản phẩm
                </h5>
                @endfor
            </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="" class="btn btn-primary">Back</a>
    </form>
@endsection
