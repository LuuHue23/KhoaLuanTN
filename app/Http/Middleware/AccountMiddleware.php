<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AccountMiddleware
{
    private $acc;
    public function __construct(){

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard='acc')
    {
        if(Auth::guard($gard)->check()){
            return $next($request);
        }
    }
}
