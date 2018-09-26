@extends('layouts.app')

@section('content')
    <center><h1>Edit  Service Provider </h1></center>
    @foreach ($servp as $serv)
     
    
    {!! Form::open(['action'=> ['ServiceprovController@update', $serv->SP_ID], 'method'=>'POST']) !!}
        <div class="form-group">
            {{form::label('name', 'Name')}}
            {{form::text('name', $serv->name, ['class'=>'form-control', 'placeholder'=>'Name'])}}
        </div>
        <div class="form-group">
            {{form::label('description', 'Description')}}
            {{form::textarea('description', $serv->description, ['id'=>'description-ckeditor','class'=>'form-control', 'placeholder'=>'Description'])}}
        </div>
        
        {{form::hidden('_method', 'PUT')}}
        {{form::submit('Submit', ['class'=>'btn btn-primary'])}}
        
    {!! Form::close() !!}
    @endforeach
@endsection
 