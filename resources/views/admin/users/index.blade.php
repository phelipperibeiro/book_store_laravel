@extends('layouts.app')

@section('content')

<div class="container">
    <a href="{{route('admin.users.create')}}">Create</a>

    <br>
    <br>

    <h2>Users</h2>



    <br>
    <br>

    <table class="table table-bordered">
        <thead>
        <th>Name</th>
        <th>Description</th>
        <th>Action</th>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->description}}</td>
                <td>
                    <a href="{{route('admin.users.edit',['id'=>$user->id])}}" class="btn btn-default">
                        Editar
                    </a>
                    
                    <a href="{{route('admin.users.roles',['id'=>$user->id])}}" class="btn btn-default">
                        roles
                    </a>
                 

                    <a href="{{route('admin.users.destroy',['id'=>$user->id])}}" class="btn btn-danger">
                        Delete
                    </a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection