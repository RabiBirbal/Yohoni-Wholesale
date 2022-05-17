<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cart;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::has('user')){
            $user_id=session()->get('user')['id'];
            }
            else{
                $user_id="";
            }
        $cart= Cart::where('user_id',$user_id)->count();
        $category=Category::all();
        $user=User::find($user_id);
        
        return view('frontend/profile',compact("cart","category","user"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user_id=session()->get('user')['id'];
        $cart= Cart::where('user_id',$user_id)->count();
        $category=Category::all();
        $user=User::find($user_id);

        return view('frontend/edit-profile',compact("cart","category","user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if(Session::has('user')){
            $user_id=session()->get('user')['id'];
            }
            else{
                $user_id="";
            }
        $user=User::find($user_id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->mobile=$request->mobile;
        $user->address=$request->address;
        $cart= Cart::where('user_id',$user_id)->count();
        $category=Category::all();

        $user->save();
        Session::put('success','Your Profile Has Been Updated');
        return view('frontend/profile',compact("cart",'category',"user"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function editPassword()
    {
        $user_id=session()->get('user')['id'];
        $cart= Cart::where('user_id',$user_id)->count();
        $category=Category::all();
        $user=User::find($user_id);

        return view('frontend/password-change',compact("cart","category","user"));
    }
    public function updatePassword(Request $request)
    {
        $user_id=session()->get('user')['id'];
        $user=User::find($user_id);
        if(!$user || !hash::check($request->current_password,$user->password))
        {
            Session::put('error','Current Password did not matched');
            return back();
            // return "Current Password did not matched";
        }
        else{
            $user->password=Hash::make($request->confirm_password);
            $cart= Cart::where('user_id',$user_id)->count();
            $category=Category::all();

            $user->save();
            Session::put('success','Your Password Has Been Changed Successfully');
            return redirect('logout_user');
        }
    }
}
