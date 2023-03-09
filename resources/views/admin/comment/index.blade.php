@extends('admin.layouts.master')
@section('content')
    @include('sweetalert::alert')
    <div class="page-container">
        <div class="main-content">
            <div class="container">
                <section class="section">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Nội dung bài viêt</th>
                                <th scope="col">Chi tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comments as $key => $comment)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $comment->content }}</td>
                                    <td>
                                        <a href="{{ route('comments.detail',[$comment->id]) }}" class="btn btn-danger">Xem chi tiết</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <table>
                </section>
            </div>
        </div>
    </div>
@endsection
