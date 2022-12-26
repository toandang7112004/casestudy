@extends('admin.layouts.master')

@section('content')
        <table class="table">
            <thead>
            <tr>
                <th colspan="4">ID</th>
                <th colspan="4">Name</th>
                <th colspan="4">Address</th>
                <th colspan="4">Email</th>
            </tr>
            </thead>
            <tbody>
                @foreach($customers as $key => $customer)
            <tr>
                <th colspan="4">{{ ++$key }}</th>
                <td colspan="4">{{ $customer->name }}</td>
                <td colspan="4">{{ $customer->address }}</td>
                <td colspan="4">{{ $customer->email }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endsection