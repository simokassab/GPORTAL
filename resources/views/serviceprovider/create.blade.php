@extends('layouts.app')

@section('content')
    <center><h1>Create Service Provider </h1></center>
    {!! Form::open(['action'=>'ServiceprovController@store', 'method'=>'POST']) !!}
        <div class="form-group">
            {{form::label('name', 'Name')}}
            {{form::text('name', '', ['class'=>'form-control', 'placeholder'=>'Name'])}}
        </div>
        <div class="form-group">
            {{form::label('description', 'Description')}}
            {{form::textarea('description', '', ['id'=>'description-ckeditor','class'=>'form-control', 'placeholder'=>'Description'])}}
        </div>
        {{form::submit('Submit', ['class'=>'btn btn-primary'])}}
        
    {!! Form::close() !!}
@endsection

<script>
    
</script>