<?php

namespace App\Http\Middleware;

use Closure;

class AdminLogin
{
    /**
     * 判断用户是否授权，非授权用户直接跳转至登录页面
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

//        if(!session('user')){
//            return redirect('cms/login');
//        }
        return $next($request);
    }
}
