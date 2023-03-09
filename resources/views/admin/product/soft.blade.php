@extends('admin.layouts.master')
@section('content')
        <table class="table">
            <a href="{{ route('products.index') }}" class="btn btn-info">Back</a>
            <thead>
            <tr>
                <th colspan="4">ID</th>
                <th colspan="4">Name</th>
                <th colspan="4">Price</th>
                <th colspan="4">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($softs as $key => $soft)
            <tr>
                <th colspan="4">{{ ++$key }}</th>
                <td colspan="4">{{ $soft->name }}</td>
                <td colspan="4">{{ $soft->price }}</td>
                <td>
                    @if (Auth::user()->hasPermission('Product_deleteforever'))
                    <a href="{{route('products.deleteforever',[$soft->id])}}" class="btn btn-danger">Delete forever</a>
                    @endif
                    @if (Auth::user()->hasPermission('Product_restore'))
                    <a href="{{ route('products.restore',[$soft->id]) }}" class="btn btn-primary">Restore</a>
                    @endif
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
@endsection