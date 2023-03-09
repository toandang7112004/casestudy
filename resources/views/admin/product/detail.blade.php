@extends('admin.layouts.master')
@section('content')
    <style>
        i {
            color: red;
            text-align: right;
        }
    </style>
    <div class="page-wrapper">
        <div class="page-container">
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-lg-8 col-xl-6">
                            <div class="card border-top border-bottom border-3" style="border-color: #000000 !important;">
                                <div class="card-body p-5">
                                    <p class="lead fw-bold mb-5" style="text-align: center">Chi Tiết Bình Luận</p>
                                    <div class="row">
                                        <div class="col mb-4">
                                            <dt>Tên sản phẩm: <i>{{ $comments->product_comment->name }}</i> </dt>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-4">
                                            <dt>Tên khách hàng: <i>{{ $comments->customer->name }}</i> </dt>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-4">
                                            <dt>Nội dung bình luận </dt>
                                            <i>{{ $comments->content }}</i>
                                        </div>
                                    </div>
                                    <dt>Ảnh chi tiết</dt>
                                    <div class="thumbnail_images">
                                        <ul style="padding-left: 0rem;" id="thumbnail">
                                            <img class="act" src="{{ asset('public/uploads/' . $comments->product_comment->image) }}" width="100px">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('comments.index') }}" class="btn btn-danger">Trở lại</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
