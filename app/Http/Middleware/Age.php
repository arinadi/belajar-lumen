<?php

namespace App\Http\Middleware;

use Closure;

class Age
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $min, $max = null)
    {
        //return $max;
        if($request->age < $min){
            return redirect('/admin/home');
        }
        if($max != null && $request->age > $max){
            return redirect('/admin/home');
        }

        return $next($request);
    }
}
