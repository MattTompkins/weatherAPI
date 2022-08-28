<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class currentWeatherService {

    public function __construct() {
        $this->weatherData = [];
    }

    public function getCurrentWeather(array $coordinates) {

        /**
        * Accepts longitude and latitude. Queries Open Weather API
        * and returns a JSON resposne of the current weather.
        *
        * @param array $coordinates['longitude' => 'VALUE', 'latitude => 'VALUE']
        *         
        * @return string $data Returns JSON response of current weather
        */

      $apiKey = config("app.openWeatherAPIKey");

      $response = Http::get("https://api.openweathermap.org/data/2.5/weather?lat={$coordinates['latitude']}&lon={$coordinates['longitude']}&appid={$apiKey}");
      $data = $response->json();
      
      $this->weatherData = $data;

  }

}