<?php

namespace Domains\Users\Http\Middleware;

use Closure;
use Parents\Requests\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }

        return $next($request);
    }
}
