<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

class CheckAge
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
        //Middleware Logic
        $age = Auth::user() -> age;
        if($age < 15){
            return redirect()->route('Not.Adult');
        }
        return $next($request);
    }
}
