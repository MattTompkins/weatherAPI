<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Services\postcodeCoordinateService;
use App\Services\checkForecastFrequencyService;
use App\Services\currentWeatherService;
use App\Services\weatherForecastService;
use App\Exceptions\JsonException;

class WeatherAPITest extends TestCase
{


    // To add: test individual routes

    public function test_postcode_to_coordinate_service()
    {

        // Known postcode and coordinates of King's Cross Station
        $coordinates = postcodeCoordinateService::postcodeToCoordinates('NW19AL');
        $knownCoordinates = [
            'longitude' => -0.127871,
            'latitude' => 51.547483
        ];

        $this->assertEquals($knownCoordinates, $coordinates);
    }

    public function test_forecast_frequency_set_to_daily() {
        $frequency = checkForecastFrequencyService::checkFrequency('daily');
        $this->assertEquals('daily', $frequency);
    }

    public function test_forecast_frequency_set_to_hourly() {
        $frequency = checkForecastFrequencyService::checkFrequency('hourly');
        $this->assertEquals('hourly', $frequency);
    }

    public function test_forecast_frequency_set_to_error() {

        try {
            checkForecastFrequencyService::checkFrequency('ERROR');
        }
        catch (JsonException $e) {
            $testError = True;
        }
        
        $this->assertEquals(True, $testError);
     
    }
    
    public function test_open_weather_api_key_set() {
        if(config("app.openWeatherAPIKey")) {
            $test = True;
        }
        $this->assertEquals(True, $test);
    }


}
