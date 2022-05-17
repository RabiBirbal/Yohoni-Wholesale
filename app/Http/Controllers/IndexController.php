<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    function showData(){
        // return Tbl_admin::all();
        $banner=Banner::where('category','Main Banner')->get();
        $banner1=Banner::where('category','Middle Banner')->get();
        $home_appliances=Product::where('category','Home Appliance')->orderBy('id','desc')->get()->take(4);
        $clothing=Product::where('category','Clothing')->orderBy('id','desc')->get()->take(4);
        $electric=Product::where('category','Electric')->orderBy('id','desc')->get()->take(4);
        $mobile=Product::where('category','Mobile')->orderBy('id','desc')->get()->take(4);
        $footwear=Product::where('category','Footwear')->orderBy('id','desc')->get()->take(4);
        if(Session::has('user')){
        $user_id=session()->get('user')['id'];
        $cart= Cart::where('user_id',$user_id)->count();
        $category=Category::all();
        $user=User::find($user_id);
        }
        else{
            $user_id="";
            $cart= Cart::where('user_id',$user_id)->count();
            $category=Category::all();
            $user=User::find($user_id);
        }

        return view('frontend/home',compact("banner","banner1","home_appliances","electric","mobile","footwear","clothing","cart","category","user"));

    }
}