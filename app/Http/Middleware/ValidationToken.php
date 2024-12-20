<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidationToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $apiKey = $request->header('API-KEY');
        $validApiKey = 'user123';
        if ($apiKey !== $validApiKey) {
            return response()->json(['message'=> $apiKey . " not valid"])->setStatusCode(400);
        }
        return $next($request);
    }
}
