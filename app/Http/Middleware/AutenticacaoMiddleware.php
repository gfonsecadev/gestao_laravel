<?php

namespace App\Http\Middleware;

use Closure;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$validacao)
    {   session_start();
        if(isset($_SESSION["email"]) &&  isset($_SESSION["senha"])){
            return $next($request);
        }else return redirect()->route("site.login",["erro"=>2]);
        
    }
}
