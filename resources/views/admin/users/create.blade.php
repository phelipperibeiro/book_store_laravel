@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Create new Users</h2>

    {!! Form::open(['route'=>'admin.users.store']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::text('email', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', ['class'=>'form-control']) !!}
    </div>


    {!! Form::submit('Add user', ['class'=>'btn btn-primary']) !!}

    {!! Form::close() !!}

</div>

@endsection