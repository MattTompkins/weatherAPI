<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class generateHALLinks
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $response = $next($request);

        if ($response instanceof  \Illuminate\Http\JsonResponse) {

            /**
             *      Middleware to convert JSON output from controller to a
             *      basic HAL Link Format. Space availible for further development. 
             **/

            $HALArray = [
                "_links" => ["self" => request()->path()],
                "_user" => ["name" => request()->user()],
                "_embedded" => $response
            ];

            return response($HALArray);
        } else {
            return $response;
        }
    }
}
