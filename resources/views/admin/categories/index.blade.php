@extends('layouts.app')

@section('content')

<div class="container">
    <a href="{{route('admin.categories.create')}}">Create</a>

    <br>
    <br>

    <h2>Categories</h2>



    <br>
    <br>

    <table class="table table-bordered">
        <thead>
        <th>Name</th>
        <th>Description</th>
        <th>Action</th>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{$category->name}}</td>
   
                <td>
                    <a href="{{route('admin.categories.edit',['id'=>$category->id])}}" class="btn btn-default">
                        Editar
                    </a>
                
                    <a href="{{route('admin.categories.destroy',['id'=>$category->id])}}" class="btn btn-danger">
                        Delete
                    </a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection