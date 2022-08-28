<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Services\checkForecastFrequencyService;

class weatherForecastService
{

    public function __construct() {
        $this->weatherData = [];
    }

    public function getWeatherForecast(array $coordinates, string $frequency)
    {
  

        /**
        * Verifies forecast frequency is valid. Queries Open Meteo API and retrives 
        * either daily or hourly weatherforecast for given coordinates.
        *
        * @param array $coordinates['longitude' => 'VALUE', 'latitude' => 'VALUE']
        * @param string $frequency - either set to daily or hourly - if not, throws error.
        *         
        * @return string $this->weatherData - returns weather forecast in JSON format
        */

        $frequency = checkForecastFrequencyService::checkFrequency($frequency);

        if ($frequency == "daily") {
            $parameters = "temperature_2m_max,temperature_2m_min,apparent_temperature_max,apparent_temperature_min,precipitation_sum,precipitation_hours,sunrise,sunset";
        } elseif ($frequency == "hourly") {
            $parameters = "temperature_2m,apparent_temperature,precipitation,cloudcover,windspeed_10m";
        }

        $response = Http::get("https://api.open-meteo.com/v1/forecast?latitude={$coordinates['latitude']}&longitude={$coordinates['longitude']}&timezone=auto&{$frequency}={$parameters}");

        $this->weatherData = $response->json();
        return $this->weatherData;
    }
}
