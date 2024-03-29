<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MakeSureRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();
        if($role == 'admin' && $user->is_admin !== 0 || $role == 'teacher' && $user->is_admin !== 1 || $role == 'student' && $user->is_admin !== 2 || $role == 'officer' && $user->is_admin !== 3){
            return redirect()->route('403');
        }
        return $next($request);
    }
}
