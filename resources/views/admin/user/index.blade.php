@extends('adminlte::page')

@section('title', 'Dashboard')
@include('admin.post.scholarship.cdn')
@section('content_header')
    <h1 class="font-weight-bold text-center text-primary">List all User Information </h1>
@stop

@section('content')
{{--    <a href="{{route('user.create')}}" class="btn btn-success float-right">Add User</a>--}}
    <table class="table" id="dataTable">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Create At</th>
            <th scope="col">Action</th>

        </tr>
        </thead>
        @foreach($users as $user)
            <tr>
                <td>{{++$i}}</td>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role}}</td>
                <td>{{$user->created_at}}</td>
                <td width = 300px>
                    <a href="{{route('user.editrole',$user->id)}}" class="btn btn-warning">Edit Role</a>
                    <a href="{{route('user.delete',$user->id)}}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
@stop
