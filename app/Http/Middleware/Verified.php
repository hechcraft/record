<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Verified
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (! $request->user()) {
            return abort(403, 'Ошибка, у вас нет доступа.');
        }

        if ($request->user()->is_verified === 0) {
            return abort(403, 'Ваш аккаунт не верефицирован.');
        }
        return $next($request);
    }
}
