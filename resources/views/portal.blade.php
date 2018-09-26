<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>G Portal</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    </head>
    <body >
           
        <div class="container">
           <div class="gradient1" style="margin-top: 20px; width:100%;"> 
                <center> <img src="/GPORTAL/img/title.png" style="width: 60%; margin-top: 20px;"  ><br/>
                <img src="/GPORTAL/img/zainlogo.png"  style="width: 30%; margin-bottom: 20px; "></center>
            </div>
            <br/>
            <div class="gradient2" id="content" style="margin-top:20px;">
                <div class="row" id="row" style="margin-left:30px; margin-right:30px" >
                    @foreach ($services as $ser)
                     <div class="col-md-6" style="margin-top:30px;" id='{{$ser->SV_ID}}'>
                            <div class="card mb-4 box-shadow">
                            <img class="img-thumbnail"  src="uploads/{{$ser->images}}" style="max-height:300px; max-width:500px;" alt="{{$ser->name}}">
                            <h3 align="center">{{$ser->name}}</h3>
                                <div class="card-body">
                                    <p>{!! str_limit($ser->description, 30) !!}</p>
                                    <small class="text-muted">Provider: {!! $ser->SP_NAME  !!} </small> 
                                    <small class="text-muted">/ Category: {!! $ser->CAT_NAME  !!}</small>
                                 </div>
                                </div>
                        </div> 
                    
                    @endforeach
                </div>   
            </div>
            <br>
            <div id="content2">
                <div class="gradient3"  style="cursor: pointer;">
                    <h2 style="color: white" id='latest' align="center">LATEST SERVICES</h2>
                    <div id="latest_content" style="display: none;">
                            <center><center>
                                <ol class="list-group custom-counter" id="listservices">
                                    @foreach ($latestservices as $lat)
                                <li class="list-group-item liservice" id='{{$lat->SV_ID}}'>{!! $lat->name !!}</li>  
                                    @endforeach
                                    
                                    
                                </ol></center>
                     </div>
                </div>
                <div class="gradient4" id="gr4"></div>
                <div class="gradient3"   style="cursor: pointer;">
                    <h2 style="color: white !important;" id='top' align="center">TOP 10 SERVICES</h2>
                    <div id="top_content" style="display: none;">
                        
                        </center>
                     </div>
                </div>
                <div class="gradient4" id="gr4"></div>
                <div class="gradient3"   style="cursor: pointer;">
                    <h2 style="color: white !important;" id='cat1' align="center">CAT 1 SERVICES</h2>
                    <div id="cat1_content" style="display: none;">
                        <center><h2>Content 3</h2></center>
                    </div>
                </div>
                <div class="gradient4" id="gr4"></div>
                <div class="gradient3"   style="cursor: pointer;">
                    <h2 style="color: white !important;" id='cat2' align="center">CAT 2 SERVICES</h2>
                    <div id="cat2_content" style="display: none;">
                        <center><h2>Content 4</h2></center>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

<script>
$(document).ready(function() {
    $(".col-md-6").click(function(){ 
        $id=$(this).attr('id');
        location.href = 'portal/'+$id;
     }); 
     $(".liservice").click(function(){ 
        $id=$(this).attr('id');
        location.href = 'portal/'+$id;
     });
    $("#latest").click(function(){
        $('#latest_content').toggle("slide");
        $('#top_content').slideUp("fast");
        $('#cat1_content').slideUp("fast");
        $('#cat2_content').slideUp("fast");
    }); 
    $("#top").click(function(){
        $('#top_content').toggle("slide");
        $('#latest_content').slideUp("fast");
        $('#cat1_content').slideUp("fast");
        $('#cat2_content').slideUp("fast");
    }); 
    $("#cat1").click(function(){
        $('#cat1_content').toggle("slide");
        $('#latest_content').slideUp("fast");
        $('#top_content').slideUp("fast");
        $('#cat2_content').slideUp("fast");
    }); 
    $("#cat2").click(function(){
        $('#cat2_content').toggle("slide");
        $('#latest_content').slideUp("fast");
        $('#cat1_content').slideUp("fast");
        $('#top_content').slideUp("fast ");
    }); 
});
</script>