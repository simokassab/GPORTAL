@extends('layouts.app')

@section('content')
    <center><h1>Service Provider </h1></center>
        <a href="serviceprovider/create" class="btn btn-primary a-btn-slide-text">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            <span><strong>Create New</strong></span>            
        </a>
    <hr>
    @if(count($serviceprov)>0)
        @foreach ($serviceprov as $serv)
           
            <div class="card">
                
                <div class="card-block">
                  <h3 class="card-title">{{$serv->name}}</h3>
                  <p class="card-text">{!!$serv->description!!}</p>
                  <small>{{$serv->created_date}}</small>
                     
                    {!! Form::open(['action'=> ['ServiceprovController@destroy', $serv->SP_ID], 'method'=>'POST']) !!}
                    <a href='/GPORTAL/public/serviceprovider/{{$serv->SP_ID}}/edit' class="btn btn-primary a-btn-slide-text">
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                        <span><strong>Edit</strong></span>          
                    </a>   
                    {{form::hidden('_method', 'DELETE')}}
                        {{ Form::button('<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Delete', array(
                            'type' => 'submit',
                            'class'=> 'btn btn-danger',
                            'onclick'=>'return confirm("Are you sure?")'
                        )) }} 
                    {!! Form::close() !!}
                </div>
              </div>
              
              <hr/>
        @endforeach
        {{$serviceprov->links()}}
    @else 
        <h2>No Service Provider Available</h2>
    @endif
           
@endsection

 