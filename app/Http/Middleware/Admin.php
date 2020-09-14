<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class Admin extends Middleware
{
    protected $guards=[];

    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;
        if(Auth::user()->role=='admin'){
        return $next($request);
        }
        else
            toast('You are not allowed to that Page','error');
            return redirect()->back();
    }
}
