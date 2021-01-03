<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Customer
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
        if (auth()->check()) {
            if (auth()->user()->role == 'customer') {
                return $next($request);
            } else {
                return redirect()->back()->with('error', 'admin can\'t login to customer dashboard');
            }
        } else {
            return redirect()->back();
        }
    }
}
