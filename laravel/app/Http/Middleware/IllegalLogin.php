<?php

namespace App\Http\Middleware;

use Closure;

class IllegalLogin
{
    /**
     * 运行请求过滤器。
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        session_start();
        if (!isset($_SESSION['admin']))
        {
            return redirect("/admin_login");
        }else
        {
            return $next($request);
        }
    }
}