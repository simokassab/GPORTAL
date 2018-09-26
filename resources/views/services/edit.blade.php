@extends('layouts.app')

@section('content')
    <center><h1>Edit  Service Provider </h1></center>
    @foreach ($services as $ser)
    {!! Form::open(['action'=>['ServicesController@update', $ser->SV_ID], 'method'=>'POST', 'enctype' => 'multipart/form-data']) !!}

        <div class="form-group">
            {{form::label('name', 'Name')}}
            {{form::text('name', $ser->name, ['class'=>'form-control', 'placeholder'=>'Name'])}}
        </div>
        <div class="form-group">
            {{form::label('description', 'Description')}}
            {{form::textarea('description', $ser->description, ['id'=>'description-ckeditor','class'=>'form-control', 'placeholder'=>'Description'])}}
        </div>
        <div class="form-group">
            {{form::label('sp', 'Service Provider: ')}}
            <select class="form-control" name="serviceprov" id='serviceprov'>
                @foreach($serviceprov as $serv)
                    @if ($serv->SP_ID==$ser->SP_ID_FK)
                          <option value="{{$serv->SP_ID}}" selected>{{$serv->name}}</option>
                    @else                    
                         <option value="{{$serv->SP_ID}}">{{$serv->name}}</option>
                    @endif

                @endforeach
              </select>         
        </div>
        <div class="form-group">
            {{form::label('cat', 'Categories: ')}}
            <select class="form-control" name="cat" id='cat'>
                @foreach($cat as $ca)
                     @if ($ca->CAT_ID==$ser->CAT_ID_FK)
                        <option value="{{$ca->CAT_ID}}" selected>{{$ca->name}}</option>
                     @else                    
                        <option value="{{$ca->CAT_ID}}">{{$ca->name}}</option>
                    @endif
                @endforeach
              </select>         
        </div>
        <div class="form-group">
                {{form::label('img', 'Change your Image: ')}}
                {!! form::file('image', array('class' => 'form-control')) !!}        
        </div>
        <div>
            <img src='../../uploads/{{$ser->images}}' />
        </div>
        {{form::hidden('_method', 'PUT')}}
        {{form::submit('Submit', ['class'=>'btn btn-primary'])}}
        
    {!! Form::close() !!}
    @endforeach
@endsection
 