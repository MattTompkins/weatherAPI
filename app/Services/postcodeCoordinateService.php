<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Exception;
use App\Exceptions\JsonException;

class postcodeCoordinateService
{

    public static function postcodeToCoordinates(string $postcode)
    {

        /**
        * Takes parameter of postcode, queries postcode API and returns array of 
        * longitude and latitude
        *
        * @param string $postcode
        *         
        * @return array $coordinates['longitude' => 'VALUE', 'latitude' => 'VALUE']
        */

        $response = Http::get("api.postcodes.io/postcodes/{$postcode}");
        try {
            $coordinates = [
                'longitude' => $response['result']['longitude'],
                'latitude' => $response['result']['latitude']
            ];
            return $coordinates;
        } catch (Exception $e) {
            throw new JsonException("Error: Invalid Postcode Provided.");
            exit;
        }
    }
}
