<?php

namespace App\Http\Middleware;

use Closure;
use Route;//引入route门面
use Auth;//引入auth门面

class CheckRbac
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
        if(Auth::guard('admin')->user()->role_id!='1'){
            //开始RBAC的鉴权操作
            //获取当前路由  "App\Http\Controllers\Admin\IndexController@index"
            $route = Route::currentRouteAction();
            //获取当前角色所具备的权限
            $ac=Auth::guard('admin') -> user() -> role -> auth_ac;
            $ac=strtolower($ac.',indexcontroller@index,indexcontroller@welcome');//全部转化为小写
            //判断权限数组
            $routeArr = explode('\\',$route);//截取\后面的数据
            $newroute=strtolower(end($routeArr));
            if(strpos($ac,$newroute)===false){
                exit("<h1>您没有访问权限！</h1>");//当然也可以找个页面，跳转 过去
            }
            // dd($ac);    
            // dd($route);
            // phpinfo();//测试中间件是否执行
        }
       
        //继续后续的请求
        return $next($request);
    }
}
