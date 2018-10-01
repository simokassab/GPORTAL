<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>G Portal</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    </head>
    <body style='background-image: url("{{asset('img/bg.jpg')}}") !important; '>
            
        <div class="container">
           <div class="gradient1" style="margin-top: 20px; width:100%;"> 
            <center> <img src="{{asset('img/title.png')}}" style="width: 60%; margin-top: 20px;"  ><br/>
                <img src="{{asset('img/zainlogo.png')}}"  style="width: 30%; margin-bottom: 20px; "></center>
            </div>
            <br/> 
            <center><a href="{{ URL::previous() }}" class="btn btn-secondary btn-lg a-btn-slide-text">
                    <span class="glyphicon glyphicon-step-backward" aria-hidden="true"></span>
                     <span><strong>Go Back</strong></span></a> <br/><br/>
            <h1>{{$catname[0]->name}}</h1>
            <div class="gradient4" id="gr4"></div>
           
            @if($services->isEmpty())
                    <center><h2>No Games found in this category</h2></center>
                
                    
                @else 
                    <div style="margin-top:20px;">
                        @foreach ($services as $ser)
                        <div class="carousel-cell" id='{{$ser->SV_ID}}'>
                            <div class="card mb-4 box-shadow">
                                <img class="img-thumbnail"  src="../uploads/{{$ser->images}}" style="height:200px; max-height:300px; max-width:500px;" alt="{{$ser->name}}">
                                <h3 align="center">{{$ser->name}}</h3>
                                    <div class="card-body">
                                        <p>{!! str_limit($ser->description, 30) !!}
                                        <small class="text-muted">Provider: {!! $ser->SP_NAME  !!} </small> 
                                        <small class="text-muted">/ Category: {!! $ser->CAT_NAME  !!}</small></p>
                                        </div>
                            </div>
                    
                        </div>
                        <div class="gradient4" id="gr4"></div>
                        @endforeach
                    </div>   
                @endif
                
            <br/> <br/>
        </div>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    </body>
</html>

<script>
   
$(document).ready(function() {
    $(".carousel-cell").click(function(){ 
        $id=$(this).attr('id');
        $clicked='viewed';
        $.ajax({
            url: "logs/"+$id+'/'+$clicked,
            type: "get",
            data:  '1',
            success: function (response) {

            },
            error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
            }
        });
        location.href = '../portal/'+$id;
     });   

     

});
</script>