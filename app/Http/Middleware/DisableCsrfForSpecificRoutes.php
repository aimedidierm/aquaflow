<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DisableCsrfForSpecificRoutes
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'api/status', // Add your API route here
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next)
    {
        foreach ($this->except as $route) {
            if ($request->is($route)) {
                return $next($request);
            }
        }

        // If the request doesn't match any of the routes, continue with CSRF verification
        if ($request->method() === 'POST') {
            $this->addCookieToResponse($request, $next($request));
        }

        return $next($request);
    }

    /**
     * Add the CSRF token to the response cookies.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Symfony\Component\HttpFoundation\Response  $response
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function addCookieToResponse($request, $response)
    {
        $response->headers->setCookie(
            cookie()->make('XSRF-TOKEN', $request->session()->token(), 0, '/', null, config('session.secure'), config('session.http_only'), false, 'Lax')
        );

        return $response;
    }
}
