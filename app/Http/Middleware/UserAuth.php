<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // user
        if($request->path()=="user_login" && $request->session()->has('user')){
            return redirect('/');
        }
        if($request->path()=="user_register" && $request->session()->has('user')){
            return redirect('/');
        }
        if($request->path()=="user/profile" && !$request->session()->has('user')){
            return redirect('/user_login');
        }
        if($request->path()=="user/profile/edit" && !$request->session()->has('user')){
            return redirect('/user_login');
        }
        if($request->path()=="user/profile/update" && !$request->session()->has('user')){
            return redirect('/user_login');
        }
        if($request->path()=="user/password/edit" && !$request->session()->has('user')){
            return redirect('/user_login');
        }
        if($request->path()=="user/password/update" && !$request->session()->has('user')){
            return redirect('/user_login');
        }

        // admin
        if($request->path()=="admin_login" && $request->session()->has('admin')){
            return redirect('/admin');
        }
        if($request->path()=="admin" && !$request->session()->has('admin')){
            return redirect('/admin_login');
        }
        if($request->path()=="order_management" && !$request->session()->has('admin')){
            return redirect('/admin_login');
        }
        if($request->path()=="order_details" && !$request->session()->has('admin')){
            return redirect('/admin_login');
        }
        if($request->path()=="product_management" && !$request->session()->has('admin')){
            return redirect('/admin_login');
        }
        if($request->path()=="product_details" && !$request->session()->has('admin')){
            return redirect('/admin_login');
        }
        if($request->path()=="banner_management" && !$request->session()->has('admin')){
            return redirect('/admin_login');
        }
        if($request->path()=="add_product" && !$request->session()->has('admin')){
            return redirect('/admin_login');
        }
        if($request->path()=="category" && !$request->session()->has('admin')){
            return redirect('/admin_login');
        }
        
        return $next($request);
    }
}
