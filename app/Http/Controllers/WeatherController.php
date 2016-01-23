<?php

	namespace App\Http\Controllers;

	use App\Helpers\WeatherHelper;
	use Illuminate\Http\Request;
	use Illuminate\Routing\Controller;


	class WeatherController extends Controller
	{

		public function getIndex()
		{

			$cities = array('Bangalore','Mumbai','Chennai','Delhi','kolkata');

			return view('weather', compact('cities'));

		}


		public function getWeatherReport(Request $request)
		{

			$city    = $request->input('city');
			$reponse = WeatherHelper::getCityWeatherReport($city);

			return json_encode($reponse);
			
		}



   }


   