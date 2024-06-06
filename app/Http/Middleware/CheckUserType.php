<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $type)
    {
        $user = Auth::user();
        if ($user && $user->user_type === $type) {
            return $next($request);
        }
        // dd($user);
        // Redirect or abort if user type does not match
        return redirect('/unauthorized'); // Or use abort(403) to return a 403 Forbidden response
    }
}
