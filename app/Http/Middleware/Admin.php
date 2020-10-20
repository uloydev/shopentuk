<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $role = auth()->user()->role;
        if ($role == 'admin' || $role == 'superadmin') {
            return $next($request);
        }
        return redirect()->back()->with('error', 'you are not allowed to access this page!');
    }
}
