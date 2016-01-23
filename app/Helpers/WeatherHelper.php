<?php

  namespace App\Helpers;

  class WeatherHelper 
  {

  	  public static function getCurlReq($url)
    	{
      	  $process = curl_init();
          curl_setopt($process, CURLOPT_URL, $url);
          curl_setopt($process, CURLOPT_RETURNTRANSFER, TRUE);
          curl_setopt($process, CURLOPT_SSL_VERIFYPEER, FALSE);
          curl_setopt($process, CURLOPT_RETURNTRANSFER, true);
           
          $status = curl_exec($process);
          curl_close($process);
          return $status;
    	} 


    	public static function getCityWeatherReport($city)
    	{
         
         $weather_url = 'http://query.yahooapis.com/v1/public/yql';
         $query       = 'select *  from weather.forecast where woeid in (select woeid from geo.places(1) where text="'.$city.'")';
         $query_url   = $weather_url . "?q=" . urlencode($query) . "&format=json";

         $content   = self::getCurlReq($query_url);

          $obj = json_decode($content);
          
          if(!empty($obj))
          {
            if($obj->query->count != 0)
            {
              return $obj->query->results; 
            }
          }            

    	}

  }


 ?>