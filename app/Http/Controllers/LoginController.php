<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Category;

class LoginController extends Controller
{
    function login(Request $req){
        $user= User::where(['email'=>$req->email])->first();
        // dd($user);
        // $pass=!hash::check($req->password,$user->password);
        // dd($pass);
        if(!$user || !hash::check($req->password,$user->password)){
            // return back()->with('fail','Email and Password did not matched');
            Session::put('error','Email and Password did not matched');
            return back();
            // return "Email and Password did not matched";
        }
        else{
            if($user->email_verified_at == null){
                Session::put('error','Sorry!! your email is not verified yet');
                return back();
            }
            else{
                if($user->is_admin == 1){
                    $req->session()->put('admin',$user);
                    Session::put('success','Login successfull');
                    return redirect("/admin");
            }
        else{
            Session::put('error','Sorry!! you are not admin');
            return back();
            // return "Sorry!! you are not admin";
        }
            }
        }
    }

    function userLoginIndex(){
        if(Session::has('user')){
            $user_id=session()->get('user')['id'];
            }
            else{
                $user_id="";
            }
        $cart= Cart::where('user_id',$user_id)->count();
        $category=Category::all();
        $user=User::find($user_id);

        return view ('frontend/user-login',compact("cart","category","user"));
    }

    function userLogin(Request $req){
        $user= User::where(['email'=>$req->email])->first();
        if(!$user || !hash::check($req->password,$user->password)){
            Session::put('error',"Email and password didn't matched");
            return back();
            // return "Email and password didn't matched";
        }
        else{
            if($user->email_verified_at == null){
                Session::put('error','Sorry!! your email is not verified yet');
                return back();
            }
            else{
                if($user->is_admin == 0){
                    $req->session()->put('user',$user);
                    Session::put('success','Login successfull');
                    return redirect("/");
            }
        else{
            Session::put('error','Sorry!! you are not admin');
            return back();
            // return "Sorry!! you are not admin";
        }
            }
        }
    }

   
}
