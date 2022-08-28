<?php

namespace App\Http\Controllers\weatherAPI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\postcodeCoordinateService;
use App\Services\weatherForecastService;
use App\Services\checkForecastFrequencyService;
use Exception;

class forecastController extends Controller
{

    public function fetchWeatherForecast($postcode, $frequency = 'daily')
    {

       /**
        * Gets the daily or hourly weather forecast for a given postcode
        *
        * @param string $postcode Postcode to query
        * @param string $frequency Frequency of forecast to check. Set to Daily by default
        * @return string Returns weather forecast as JSON
        */
        
        $coordinates = postcodeCoordinateService::postcodeToCoordinates($postcode);

        $weatherForecast = new weatherForecastService;
        $weatherForecast->getWeatherForecast($coordinates, $frequency);

        return $weatherForecast->weatherData;
    }
}
