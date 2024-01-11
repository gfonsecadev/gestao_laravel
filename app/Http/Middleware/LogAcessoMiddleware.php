<?php

namespace App\Http\Middleware;

use Closure;
use App\LogAcesso;
class LogAcessoMiddleware

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
        //dd($request);
        $IP=$request->server->get("REMOTE_ADDR");
        $URI=$request->server->get("REQUEST_URI");
        LogAcesso::create(["pagina" => "Ip = ".$IP." E Página= ".$URI]);
        return $next($request);
    }
}
