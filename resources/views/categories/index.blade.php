@extends('layouts.app')

@section('content')
    <center><h1>Categories </h1></center>
        <a href="categories/create" class="btn btn-primary a-btn-slide-text">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
            <span><strong>Create New</strong></span>            
        </a>
    <hr>
    @if(count($cat)>0)
        @foreach ($cat as $ca)
           
            <div class="card">
                
                <div class="card-block">
                  <h3 class="card-title">{{$ca->name}}</h3>
                  <p class="card-text">{!!$ca->description!!}</p>
                  <small>{{$ca->created_date}}</small>
                     
                    {!! Form::open(['action'=> ['CategoriesController@destroy', $ca->CAT_ID], 'method'=>'POST']) !!}
                    <a href='/GPORTAL/public/categories/{{$ca->CAT_ID}}/edit' class="btn btn-primary a-btn-slide-text">
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
        {{$cat->links()}}
    @else 
        <h2>No Category found</h2>
    @endif
           
@endsection

 