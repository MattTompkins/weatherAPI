<?php

namespace App\Services;

use App\Exceptions\JsonException;
use Illuminate\Support\Facades\Http;

class checkForecastFrequencyService
{

    public static function checkFrequency(string $frequency)
    {

        /**
        * Function to check if the forecast frequency is set to
        * either daily or hourly. If false, throws an error
        *
        * @param string $frequency - should be set to 'daily' or 'hourly'
        *         
        * @return string 'daily' or 'hourly' if correctly configured.
        */

        if ($frequency == "daily") {
            return 'daily';
        } elseif ($frequency == "hourly") {
            return 'hourly';
        } else {
            throw new JsonException("'{$frequency}' is not a valid timescale. Please use daily or hourly.");
        }
    }
}
