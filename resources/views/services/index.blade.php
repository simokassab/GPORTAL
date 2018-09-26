@extends('layouts.app')

@section('content')
    <center><h1>Services </h1></center>
        <a href="services/create" class="btn btn-primary a-btn-slide-text">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            <span><strong>Create New</strong></span>            
        </a>
    <hr>
    @if(count($services)>0)
        <table class='table'>
        @foreach ($services as $serv)
           <tr>
               <td width='75%'>
                <div class="card">
                       
                    <div class="card-block">
                    <h3 class="card-title">{{$serv->name}}</h3>
                    <p class="card-text">{!!$serv->description!!}</p>
                    <p class="card-text">Service Provider: {!!$serv->SP_NAME!!}</p>
                    <p class="card-text">Category: {!!$serv->CAT_NAME!!}</p>
                    <small>{{$serv->created_date}}</small>
                    
                        {!! Form::open(['action'=> ['ServicesController@destroy', $serv->SV_ID], 'method'=>'POST']) !!}
                        <a href='/GPORTAL/public/services/{{$serv->SV_ID}}/edit' class="btn btn-primary a-btn-slide-text">
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            <span><strong>Edit</strong></span>          
                        </a>   
                        {{form::hidden('_method', 'DELETE')}}
                            {{form::submit('Delete',  ['class'=>'btn btn-danger', 'id' =>'del', 
                                                        'onclick' => 'return confirm("Are you sure?")'])}}
                        {!! Form::close() !!}
                    </div>
                </div>
               </td>
               <td>
                    <img src='uploads/{{$serv->images}}' class='img-responsive pull-left' style='width:150px;heigh:150px;'>
               </td>
           </tr>
        @endforeach
        </table>
        {{$services->links()}}
    @else 
        <h2>No Service Provider Available</h2>
    @endif
           
@endsection

 