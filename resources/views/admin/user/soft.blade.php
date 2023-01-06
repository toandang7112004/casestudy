@extends('admin.layouts.master')
@section('content')
        <table class="table">
            <a href="{{ route('users.index') }}" class="btn btn-info">Back</a>
            <thead>
            <tr>
                <th colspan="4">ID</th>
                <th colspan="4">Name</th>
                <th colspan="4">email</th>
                <th colspan="4">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($users as $key => $user)
            <tr>
                <th colspan="4">{{ ++$key }}</th>
                <td colspan="4">{{ $user->name }}</td>
                <td colspan="4">{{ $user->email }}</td>
                <td>
                    <a href="{{route('users.deleteforever',[$user->id])}}" class="btn btn-danger">Delete forever</a>
                    <a href="{{ route('users.restore',[$user->id]) }}" class="btn btn-primary">Restore</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
@endsection