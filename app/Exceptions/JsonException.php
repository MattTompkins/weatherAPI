<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class JsonException extends Exception
{
   
    //
    /**
     * Report the exception.
     *
     * @return void
     */


    /**
     * Render the exception as an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function render($request)
    {
        return new JsonResponse([
            'errors' => [
                'message' => $this->getMessage(),
            ]
        ]);
    }
}