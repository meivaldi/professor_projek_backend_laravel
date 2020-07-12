<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if ($user->tipe != '0') {
            return response()->json([
                'error' => true,
                'status' => "Anda tidak diizinkan mengakses API ini!"
            ]);
        }

        return $next($request);
    }
}
