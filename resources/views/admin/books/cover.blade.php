@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Cover of: {{$book->title}}</h2>

    {!! Form::open(['route'=>['admin.books.cover.store', $book->id], 'enctype' => 'multipart/form-data' ]) !!}

    <div class=""form-grop>
        {!!Form::label('file', 'Cover:')!!}
        {!!Form::File('file', null, ['class' => 'form-control'])!!}
    </div>
    </br>

    {!! Form::submit('UpLoad', ['class'=>'btn btn-primary']) !!}

    {!! Form::close() !!}

</div>

@endsection