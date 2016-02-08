@extends('layouts.app')

@section('content')

<div class="container">
    <a href="{{route('admin.permissions.create')}}">Create</a>

    <br>
    <br>

    <h2>Permissions</h2>



    <br>
    <br>

    <table class="table table-bordered">
        <thead>
        <th>Name</th>
        <th>Description</th>
        <th>Action</th>
        </thead>
        <tbody>
            @foreach($permissions as $permission)
            <tr>
                <td>{{$permission->name}}</td>
                <td>{{$permission->description}}</td>
                <td>
                    <a href="{{route('admin.permissions.edit',['id'=>$permission->id])}}" class="btn btn-default">
                        Editar
                    </a>
                
                    <a href="{{route('admin.permissions.destroy',['id'=>$permission->id])}}" class="btn btn-danger">
                        Delete
                    </a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection