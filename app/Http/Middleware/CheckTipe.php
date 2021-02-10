<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckTipe
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,...$tipes)
    {   
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();

        if (in_array($request->user()->tipe,$tipes)) {
            return $next($request);
        }

        return redirect('login')->with('error', "Gak Punya Akses Ya...");
    }
}
