@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Editing role: {{$user->name}}</h2>

    {!! Form::model($user, ['route'=>['admin.users.update', $user->id], 'method'=>'put']) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::text('email', null, ['class'=>'form-control']) !!}
    </div>

    {!! Form::submit('Save user', ['class'=>'btn btn-primary']) !!}

    {!! Form::close() !!}

</div>

@endsection