<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ResponseManipulation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        $data = json_decode($response->getContent(), true);
        $data['data'] = 'ini manipulasi response';
        $content = json_encode($data);
        $response->setContent($content);
        // error_log($data);

        return $response;
    }
}
