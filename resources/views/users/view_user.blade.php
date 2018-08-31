@extends('layouts.admin')
@section('header')
    View Users
@endsection
@section('content')
    <table class="table table-bordered table-hover">
        <thead>
        <th>No</th>
        <th>Name</th>
        <th>Reg No</th>
        <th></th>
        <th></th>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$number++}}</td>
                <td>{{$user->first_name}}&nbsp;{{$user->last_name}}</td>
                <td>{{$user->reg}}</td>
                <td><a href='{{url("/edit/user/{$user->id}")}}' class="btn btn-success" onclick="
            return confirm('Edit Information for {{$user->first_name}}?')">Edit</a> </td>
                <td><a href='{{url("/delete/user/{$user->id}")}}' class="btn btn-danger" onclick="
                    return confirm('Delete User {{$user->first_name}}?')">Delete</a></td>
            </tr>
            @endforeach

        </tbody>
    </table>
    {{$users->links()}}
    @endsection