<?php


namespace App\Http\Middleware;


use Illuminate\Http\Request;

class APIJsonResponseMiddleware
{

    public function handle(Request $request, \Closure $next)
    {
        $request->headers->set('Accept', 'application/json');

        return $next($request);
    }
}
