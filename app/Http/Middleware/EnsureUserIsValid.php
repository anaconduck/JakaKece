<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserIsValid
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
        if(auth()->user()->status === 'guest'){
            return redirect()->route('home');
        }
        else if(auth()->user()->status === 'admin')
            return redirect('/admin');
        return $next($request);
    }
}
