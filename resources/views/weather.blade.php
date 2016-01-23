<!DOCTYPE html>
<html>
    <head>
        <title>Weather Report</title>

        <link href="{!!asset('css/bootstrap.min.css')!!}" rel="stylesheet" type="text/css">
        <link href="{!!asset('fonts/font-awesome/css/font-awesome.css')!!}" rel="stylesheet" type="text/css">
        <link href="{!!asset('fonts/fontello/css/fontello.css')!!}" rel="stylesheet" type="text/css">

       
    </head>
    <body>

        <div class="container">

        <h2 align="center">Select Citiy To Check Weather</h2></br>
            
          <div class="col-md-12">

          <div class="col-md-4"></div>

            <div class="col-md-4">

                <div class="form-group">
                  <select class="form-control" id="city">
                    <option value="">Select City</option>
                    <option value="bangalore">Bangalore</option>
                    <option value="mumbai">Mumbai</option>
                    <option value="chennai">Chennai</option>
                    <option value="delhi">Delhi</option>
                  </select>
                </div>
            
            </div>

            <div class="col-md-4"></div>

            </div></br></br></br></br>

            <div class="col-md-12" align="center">

                <div id='loadingmessage' style='display:none'>
                  <img src="{!! asset('lazyloader.gif') !!}"/>
                </div>

              <div id="response" ></div>

            </div>   
           
        </div>
    </body>


 <script  src="{!!asset('js/jquery.min.js')!!}"></script>

 <script>

 weather_url = "{!! URL::to('weather/report')!!}";

 </script>

    <script type="text/javascript">

        $(function () {

            $("#city").change(function(){

               $('#response').hide();

               var city = $('#city').val().replace(/^\s+|\s+$/g, "");

               if(city)
               {

                 $('#loadingmessage').show();

                 $.get(weather_url,{city:city}, function(response){

                    var weather_response = JSON.parse(response);
                    console.log(weather_response);
                    var html = '';

                    $.each(weather_response, function(index, element) {

                       html +='<ol style="list-style-type:none;">';

                       html +='<li><b>'+element.image.title+'</b></li>';
                       html +='</br>';
                       html +='<li><a href="'+element.image.link+'" style="text-decoration:none;">'+element.image.link+'</a></li>';
                       html +='</br>';
                       html +='<li><img src="'+element.image.url+'">'+'</li>';
                       html +='</br>';

                       html +='<li><b>Title : </b>'+element.title+'</li>';
                       html +='<li><b>Description : </b>'+element.description+'</li>';
                       html +='<li><b>Language : </b>'+element.language+'</li>';
                       html +='<li><b>LastBuildDate : </b>'+element.lastBuildDate+'</li>';

                       html +='</br>';

                       html +='<h4>Location</h4>';
                       html +='<li><b>city : </b>'+element.location.city+'</li>';
                       html +='<li><b>country : </b>'+element.location.country+'</li>';
                       html +='<li><b>Region : </b>'+element.location.region+'</li>';

                       html +='</br>';

                       html +='<h4>Item</h4>';
                       html +='<li><b>Title : </b>'+element.item.title+'</li>';
                       html +='<li><b>lat : </b>'+element.item.lat+'</li>';
                       html +='<li><b>long : </b>'+element.item.long+'</li>';
                       html +='<li><b>link : </b><a href="'+element.item.link+'" style="text-decoration:none;">'+element.item.link+'</a></li>';
                       html +='<li><b>pubDate : </b>'+element.item.pubDate+'</li>';
                       
                       html +='</br>';

                       html +='<h4>Condition</h4>';
                       html +='<li><b>code : </b>'+element.item.condition.code+'</li>';
                       html +='<li><b>date : </b>'+element.item.condition.date+'</li>';
                       html +='<li><b>temp : </b>'+element.item.condition.temp+'</li>';
                       html +='<li><b>text : </b>'+element.item.condition.text+'</li>';

                       html +='</br>';

                       html +='<h4>Description</h4>';
                       html +='<li>'+element.description+'</li>';
                       

                       html +='</br>';

                       html +='<h4>Units</h4>';
                       html +='<li><b>distance : </b>'+element.units.distance+'</li>';
                       html +='<li><b>pressure : </b>'+element.units.pressure+'</li>';
                       html +='<li><b>speed : </b>'+element.units.speed+'</li>';
                       html +='<li><b>temperature : </b>'+element.units.temperature+'</li>';

                       html +='</br>';

                       html +='<h4>Wind</h4>';
                       html +='<li><b>chill : </b>'+element.wind.chill+'</li>';
                       html +='<li><b>direction : </b>'+element.wind.direction+'</li>';
                       html +='<li><b>speed : </b>'+element.wind.speed+'</li>';

                       html +='</br>';

                       html +='<h4>Atmosphere</h4>';
                       html +='<li><b>humidity : </b>'+element.atmosphere.humidity+'</li>';
                       html +='<li><b>pressure : </b>'+element.atmosphere.pressure+'</li>';
                       html +='<li><b>rising : </b>'+element.atmosphere.rising+'</li>';
                       html +='<li><b>visibility : </b>'+element.atmosphere.visibility+'</li>';

                       html +='</br>';

                       html +='<h4>Astronomy</h4>';
                       html +='<li><b>sunrise : </b>'+element.astronomy.sunrise+'</li>';
                       html +='<li><b>sunset : </b>'+element.astronomy.sunset+'</li>';

                       html +='</br>';
                       
                       html +='</ol>';

                    });
                   
                    $('#response').html(html);
                    $('#response').show();
                    $('#loadingmessage').hide();
                 
                 });
               }
               
            });
        });

    </script>


</html>
