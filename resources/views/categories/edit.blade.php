@extends('layouts.app')

@section('content')
    <center><h1>Edit  Service Provider </h1></center>
    @foreach ($cat as $ca)
     
    
    {!! Form::open(['action'=> ['CategoriesController@update', $ca->CAT_ID], 'method'=>'POST']) !!}
        <div class="form-group">
            {{form::label('name', 'Name')}}
            {{form::text('name', $ca->name, ['class'=>'form-control', 'placeholder'=>'Name'])}}
        </div>
        <div class="form-group">
            {{form::label('description', 'Description')}}
            {{form::textarea('description', $ca->description, ['id'=>'description-ckeditor','class'=>'form-control', 'placeholder'=>'Description'])}}
        </div>
        
        {{form::hidden('_method', 'PUT')}}
        {{form::submit('Submit', ['class'=>'btn btn-primary'])}}
        
    {!! Form::close() !!}
    @endforeach
@endsection
 