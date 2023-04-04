<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Session;

class CheckSession
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Session::get('accessToken')) {
            return redirect('login');
        }
        return $next($request);
    }
}
