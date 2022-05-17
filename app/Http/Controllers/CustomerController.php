<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerificationMail;
use Illuminate\Support\Str;

class CustomerController extends Controller
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

        return view('frontend/user-register',compact("cart","category","user"));
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
    public function store(Request $req)
    {   
        // $req->validate([
        //     'name' => 'required|string',
        //     'email' => 'required|string|email|unique:users',
        //     'password' => 'required|string|min:5',
        //     'address' => 'required|string',
        //     'mobile' => 'required|string|min:10|max:10',
        // ]);
        $rules=[
          'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:5',
            'address' => 'required|string',
            'mobile' => 'required|string|min:10|max:10',
           ];
         $v= Validator::make($req->all(),$rules);
         if($v->fails())
            {
             // Session::Flash('error','error occur.');
                Session::put('error','Error occured or Email has alredy taken');
             return redirect()->back();
            }
        $data= new User;
        $data->name=$req->name;
        $data->email=$req->email;
        $data->password=Hash::make($req->password);
        $data->address=$req->address;
        $data->mobile=$req->mobile;
        $data->is_admin="0";
        $data->email_verification_code=Str::random(40);
        
        $data->save();
        Mail::to($req->email)->send(new EmailVerificationMail($data));
        Session::put('success','Registration has been done successfully. Please Check your email address for verification process.');
        return redirect('user_login');
        // return redirect('user_login')->with('success','Registration has been done successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function verify_email($verification_code){
        $user=User::where('email_verification_code',$verification_code)->first();
        if(!$user){
            Session::put('error','Invalid URL');
            return redirect('user_register');
        }
        else{
            if($user->email_verified_at){
                Session::put('error','Email already Verified');
                return redirect('user_register');
            }
            else{
                $user->email_verified_at=\Carbon\Carbon::now();
                $user->update();
                Session::put('success','Email Verified Successfully');
                return redirect('user_login');
            }
        }
     }
    public function show()
    {
        $data=User::where ('is_admin','0')->orderBy('id','desc')->get();
        return view('admin/index',['user'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        return view('admin/customer-edit',compact("user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        $data= User::find($req->user_id);
        $data->name=$req->name;
        $data->email=$req->email;
        $data->mobile=$req->mobile;
        $data->address=$req->address;
        
        $data->save();
        Session::put('success','Customer Details has been updated successfully');
        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=User::find($id);
        $data->delete();
        Session::put('success','Customer has been removed successfully');
        return redirect('/admin');
    }

    public function viewProfile()
    {
        $user_id=session()->get('user')['id'];
        $cart= Cart::where('user_id',$user_id)->count();
        $category=Category::all();
        $user=User::find($user_id);
        
        return view('frontend/profile',compact("cart","category","user"));
    }
}
