<?php
declare(strict_types=1);

namespace Parents\Middlewares\Http;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EnsureCorrectApiHeaders
{
    /**
     * Handle an incoming request
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if ($request->headers->get('accept') !== 'application/vnd.api+json') {
            return $this->addCorrectContentType(new Response('', 406));
        }
        if ($request->isMethod('POST') || $request->isMethod('PATCH')) {
            if ($request->header('content-type') !== 'application/vnd.api+json') {
                return $this->addCorrectContentType(new Response('', 415));
            }
        }
        return $next($request);
    }

    private function addCorrectContentType(\Symfony\Component\HttpFoundation\Response $response): \Symfony\Component\HttpFoundation\Response
    {
        $response->headers->set('content-type', 'application/vnd.api+json');
        return $response;
    }
}
