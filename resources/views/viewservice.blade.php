<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>G Portal</title>
         <link rel="stylesheet" href="{{asset('css/app.css')}}">
         <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    
    </head>
    <body style='background-image: url("{{asset('img/bg.jpg')}}") !important; '>
        
        <div class="container">
                <div class="gradient1" style="margin-top: 20px; width:100%;"> 
                        <center> <img src="{{asset('img/title.png')}}" style="width: 60%; margin-top: 20px;"  ><br/>
                        <img src="{{asset('img/zainlogo.png')}}"  style="width: 30%; margin-bottom: 20px; "></center>
                    </div>      
        <hr/>
            @foreach ($services as $ser)
                <center><a href="{{ URL::previous() }}" class="btn btn-secondary btn-lg a-btn-slide-text">
                        <span class="glyphicon glyphicon-step-backward" aria-hidden="true"></span>
                        <span><strong>Go Back</strong></span></a> <br/><br/>
                    
                    <img class="img-thumbnail rounded mx-auto d-block" style="max-width: 100%; height: auto;" src='../uploads/{{$ser->images}}' />
                    <h1 class="display-1">
                        {{$ser->name}}
                    </h1>
                    <hr/>
                    <h3>
                        {!!$ser->description!!} 
                    </h3>
                    <p>
                        <span  class="text-left text-muted"> 
                            Service Provider: {!! $ser->SP_NAME !!} 
                        </span>
                        <span  class="text-right text-muted"> 
                        Category: {!! $ser->CAT_NAME !!} 
                        </span>
                    </p>
                  
                    <a href="sms:/1234?body={{$ser->body}}"  class="btn btn-success btn-lg a-btn-slide-text" style="width: 50%;">
                        <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                        <span><strong>Subscribe</strong></span></a>
                </center>
            @endforeach
        </div>
        <br/><br/><br/>
        @include('inc.footer')
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script>
            $(".btn-success").click(function(){ 
                $id='{!! $ser->SV_ID !!}';
                $button='subscribe';
                $.ajax({
                    url: "../logs/"+$id+'/'+$button,
                    type: "get",
                    data:  '1',
                    success: function (response) {

                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                    }
                });
            });
        </script>
    </body>
</html>