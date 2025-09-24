<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     * @param \Illuminate\Http\Request $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(session('role') === 'admin') {
            return $next($request);
        }
        return redirect()->route('login.form')->with('error', 'Silahkan login sebagai admin');



        // if (Auth::guard('admin')->check()) {
        //     return $next($request);
        // }
        // return redirect()->route('login.form')->with('error', 'Silahkan login sebagai admin');
    }
}
