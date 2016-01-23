<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

	class WeatherController extends Controller
	{

		public function getIndex()
		{
			return view('weather');
		}

		public function getWeatherReport(Request $request)
		{

			$city = $request->input('city');
			$reponse = $this->getCityWeatherReport($city);

			return json_encode($reponse);
			
		}


		public function getCurlReq($url)
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


	  	public function getCityWeatherReport($city)
	  	{

	       $weather_url = 'http://query.yahooapis.com/v1/public/yql';
	       $query       = 'select *  from weather.forecast where woeid in (select woeid from geo.places(1) where text="'.$city.'")';
	       $query_url   = $weather_url . "?q=" . urlencode($query) . "&format=json";

	       $content   = $this->getCurlReq($query_url);

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