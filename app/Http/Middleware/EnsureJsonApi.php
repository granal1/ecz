<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final class EnsureJsonApi
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Установка заголовков по умолчанию для всех API ответов
        $response = $next($request);
        $response->headers->set('Content-Type', 'application/vnd.api+json');
        return $response;
    }
}
