<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function redirect;
use function route;

class UserGroupMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $group)
    {
        $user = Auth::user();
        switch ($group) {
            case "mahasiswa":
                if ($user->group !== "mahasiswa") return redirect(route('dashboard'));
                break;
            case "dosen":
                if ($user->group !== "dosen") return redirect(route('dashboard'));
                break;
            default:
                return redirect(route('auth.login'));
        }
        return $next($request);
    }
}
