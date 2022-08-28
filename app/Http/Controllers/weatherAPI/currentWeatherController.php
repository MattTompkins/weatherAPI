<?php

namespace App\Http\Controllers\weatherAPI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\postcodeCoordinateService;
use App\Services\currentWeatherService;

class currentWeatherController extends Controller
{
    public function fetchCurrentWeather($postcode)
    {
        /**
        * Gets the current weather for a given postcode
        *
        * @param string $postcode Postcode to query
        *
        * @return string Returns current weather as JSON
        */

        $coordinates = postcodeCoordinateService::postcodeToCoordinates($postcode);

        $weather = new currentWeatherService;
        $weather->getCurrentWeather($coordinates);

        return $weather->weatherData;
    }
}
