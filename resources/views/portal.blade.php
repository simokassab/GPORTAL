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
        <style>
                * { box-sizing: border-box; }

                body { font-family: sans-serif; }

                .carousel {
                    background-color: #C35E93;
                }

                .carousel-cell {
                width: 86%;
                height: 300px;
                margin-right: 10px;
                border-radius: 5px;
                }
                .imgbranded {
                    height:90px; 
                    width: 130px; 
                    max-height:100px; 
                    max-width:140px;
                }
                .brandedtitle {
                    color: aliceblue;
                    font-weight: 700;
                    text-align: center;
                    font-size: 13pt;    
                }
        </style>
    </head>
    <body >
        <div class="container">
           <div class="gradient1" style="margin-top: 20px; width:100%;"> 
                <center> <img src="{{asset('img/title.png')}}" style="width: 60%; margin-top: 20px;"  ><br/>
                <img src="{{asset('img/zainlogo.png')}}"  style="width: 30%; margin-bottom: 20px; "></center>
            </div>
            <br/> 
            <div class='gradient2' style="margin-top:10px;" >
                <div class="row">
                <div class="col-xs-6" id='{{$services[0]->SV_ID}}' style='margin-left: 10%; margin-top: 8%;'>
                            <img   class="img-thumbnail imgbranded"  src="uploads/{{$services[0]->images}}" style="" >
                            <p class='brandedtitle'>{{$services[0]->name}}</p>
                    </div>
                    <div class="col-xs-6" id='{{$services[1]->SV_ID}}' style='margin-left: 8%; margin-top: 8%;'>
                            <img   class="img-thumbnail imgbranded"  src="uploads/{{$services[1]->images}}"  >
                            <p class='brandedtitle'>{{$services[1]->name}}</p>
                    </div>
                </div>
                <div class="row">
                        <div class="col-xs-6" id='{{$services[2]->SV_ID}}' style='margin-left: 10%; margin-top: 5%;'>
                                <img   class="img-thumbnail imgbranded"  src="uploads/{{$services[2]->images}}"  >
                                <p class='brandedtitle'>{{$services[2]->name}}</p>
                        </div>
                        <div class="col-xs-6" id='{{$services[3]->SV_ID}}' style='margin-left: 8%; margin-top: 5%;'>
                                <img  class="img-thumbnail imgbranded"  src="uploads/{{$services[3]->images}}"  >
                                <p class='brandedtitle'>{{$services[3]->name}}</p>
                            </div>
                    </div>
            </div>
            <br><br>
            <div class="gradient4" id="gr4"></div>
            <br/> <br/>
            <div id="content2" style="width:100%;">
                <div class="gradient3"  >
                    <h2 style="color: white;"  align="center">LATEST</h2>
                    <div id="latest_content"  class="carousel"   data-flickity='{ "contain": true }'> 
                            @foreach ($latestservices as $lat)
                            <div class="carousel-cell" id='{{$lat->SV_ID}}'>
                                    <div class="card mb-4 box-shadow">
                                        <img class="img-thumbnail"  src="uploads/{{$lat->images}}" style="height:200px; max-height:300px; max-width:500px;" alt="{{$lat->name}}">
                                        <h3 align="center">{{$lat->name}}</h3>
                                            <div class="card-body">
                                                <p>{!! str_limit($lat->description, 30) !!}
                                                <small class="text-muted">Provider: {!! $lat->SP_NAME  !!} </small> 
                                                <small class="text-muted">/ Category: {!! $lat->CAT_NAME  !!}</small></p>
                                            </div>
                                    </div>
                            
                                </div> 
                            @endforeach   
                         </div>
                </div>
                <br/> <br/>
                <div class="gradient4" id="gr4"></div>
                <br/> <br/>
                <div class="gradient3"   >
                    <h2 style="color: white !important;" id='top' align="center">TOP 10 SERVICES</h2>
                   
                    <div id="top_content"  class="carousel"  data-flickity='{ "contain": true }'> 
                        @foreach ($topservices as $lat)
                        <div class="carousel-cell" id='{{$lat->SV_ID_FK}}'>
                            <div class="card mb-4 box-shadow">
                                <img class="img-thumbnail"  src="uploads/{{$lat->images}}" style="height:200px; max-height:300px; max-width:500px;" alt="{{$lat->name}}">
                                <h3 align="center">{{$lat->name}}</h3>
                                    <div class="card-body">
                                        <p>{!! str_limit($lat->description, 30) !!}
                                        <small class="text-muted">Provider: {!! $lat->SP_NAME  !!} </small> 
                                        <small class="text-muted">/ Category: {!! $lat->CAT_NAME  !!}</small></p>
                                    </div>
                            </div>
                        </div> 
                        @endforeach
                     </div>
                </div>
                <br/> <br/>
                <div class="gradient4" id="gr4"></div>
                <br/>
                @foreach ($catlist  as $cat)
                <a  href="Category/{{$cat->CAT_ID}}  ">
                <div class="gradient3"   >
                        <h2  id='cat1' name='{{$cat->CAT_ID}}' align="center">
                          
                            {{$cat->name}} 
                        </h2>
                    </div>
                </a>
                @endforeach

                    <div class="gradient4" id="gr4"></div>
            </div>
        </div>
        <br/><br/><br/>
        @include('inc.footer')
    </body>
</html>
<script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
        <script>
               $('.main-gallery').flickity({
                // options
                cellAlign: 'left',
                contain: true
                });
                </script>
<script>
    function GetContent(id){
      
        clicked='viewed';
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               // document.getElementById("txtHint").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "logs/"+id+'/'+clicked, true);
        xmlhttp.send();
        location.href = 'portal/'+id;
    }
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
        location.href = 'portal/'+$id;
     });   
    
    $(".col-xs-6").click(function(){ 
        $id=$(this).attr('id');
        $clicked='viewed';
      //  alert   ($id);
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
        location.href = 'portal/'+$id;
     });
     

});
</script>