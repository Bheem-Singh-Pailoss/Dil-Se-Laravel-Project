<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
     $url_session = session()->get('url_session', []);
        dd( $url_session);
//
//        if(strpos($url_session,'cart')){
//            return redirect()->intended('/checkout');
//        }
        return $next($request);
    }
}
