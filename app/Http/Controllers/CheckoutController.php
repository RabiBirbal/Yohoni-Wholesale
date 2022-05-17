<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use App\Models\Category;
use App\Models\User;
use App\Models\Product;


class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $req)
    {

        $totalBill=$req->total_bill;
        if(Session::has('user')){
            $user_id=session()->get('user')['id'];
            }
            else{
                $user_id="";
            }
        $cart= Cart::where('user_id',$user_id)->count();
        $cartItem=Cart::where('user_id',$user_id)->get();
        $category=Category::all();
        $cartTotal= Cart::where('user_id',$user_id)->sum('total');
        $user=User::find($user_id);
        foreach ($cartItem as $value) {
            $product=Product::find($value->product_id);
            if($product->product_quantity < $value->quantity){
                Session::put('error','Error occured please change the quantity');
                return redirect('cart/details');
            }
            else{
                return view('frontend/checkout',compact("totalBill","cart","category","cartItem","cartTotal","user"));
            }
        }

        
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
    public function show(Request $req)
    {
        dd($req->total_bill);
        $user_id=session()->get('user')['id'];
        $cart= Cart::where('user_id',$user_id)->count();
        $cartItem=Cart::where('user_id',$user_id)->get();
        $category=Category::all();
        $cartTotal= Cart::where('user_id',$user_id)->sum('total');

        return view('frontend/checkout',compact("cart","category","cartItem","cartTotal"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
