<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        
   
    <style>
         .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .m-b-md {
                margin-bottom: 100px;
            }
    </style>
    </head>
    <body>    
        @include('inc.navbar');
      <div class="container"> 
          @include('inc.messages')      
        @yield('content')
      </div>  
      <script type="text/javascript" src="{{ URL::asset('/js/jquery.min.js') }}"></script>
      <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    
    </body>
</html>

