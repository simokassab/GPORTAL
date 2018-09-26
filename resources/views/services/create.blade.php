@extends('layouts.app')

@section('content')
    
    <center><h1>Create Service</h1></center>
    {!! Form::open(['action'=>'ServicesController@store', 'method'=>'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{form::label('name', 'Name')}}
            {{form::text('name', '', ['class'=>'form-control', 'placeholder'=>'Name'])}}
        </div>
        <div class="form-group">
            {{form::label('description', 'Description')}}
            {{form::textarea('description', '', ['id'=>'description-ckeditor','class'=>'form-control', 'placeholder'=>'Description'])}}
        </div>
        <div class="form-group">
            {{form::label('sp', 'Service Provider: ')}}
            <select class="form-control" name="serviceprov" id='serviceprov'>
                @foreach($serviceprov as $serv)
                  <option value="{{$serv->SP_ID}}">{{$serv->name}}</option>
                @endforeach
              </select>         
        </div>
        <div class="form-group">
            {{form::label('cat', 'Categories: ')}}
            <select class="form-control" name="cat" id='cat'>
                @foreach($cat as $ca)
                  <option value="{{$ca->CAT_ID}}">{{$ca->name}}</option>
                @endforeach
              </select>         
        </div>
        <div class="form-group">
            {{form::label('img', 'Upload your Image: ')}}
            {!! form::file('image', array('class' => 'form-control')) !!}        
        </div>
        {{form::submit('Submit', ['class'=>'btn btn-primary'])}}
        
    {!! Form::close() !!}
@endsection

<script>
    
</script>