<?php

namespace App\Http\Middleware;

use Closure;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        $role = $request->user()->roles->pluck('name')->toArray();
        if (in_array($role[0], $roles)) {
            return $next($request);
        } else {
            return redirect()->route('login');
        }
    }
}
