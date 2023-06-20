<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;

class BlockUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (Auth::check() && Auth::user()->isBlocked()) {
        //     Auth::logout();
        //     return redirect('/login')->with('message', 'Your account has been blocked. Please contact the administrator.');
        // }
        $user = $request->user();

        if ($user && $user->blocked) {
            Auth::logout();
            // You can customize the response or redirect as per your requirements
            return response()->json(['error' => 'Your account has been blocked.'], 403);
        }

        return $next($request);
    }
}
