<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;

class CartController extends Controller
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
        $carts=Cart::where('user_id',$user_id)->get();
        // $cartlist=DB::table('carts')
        // ->join('products','products.id','=','carts.product_id')
        // ->where('carts.user_id',$user_id)
        // // ->select('carts.*','products.*')
        // ->get();
        $cartlist= Product::join('carts', 'carts.product_id', '=', 'products.id')
        ->where('user_id',$user_id)
        ->get();
        // dd($cartlist);
        foreach ($cartlist as $value) {
            $size=explode(",",$value->available_size);
        }
        $cartTotal=Cart::where('user_id',$user_id)->sum('total');
        $user=User::find($user_id);

        return view("frontend/cart-detail",compact("cart","category","cartlist","carts","cartTotal","user","size"));
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
        if($req->session()->has('user')){
           $data=new Cart;
           $data->quantity=$req->quantity;
           $data->size=$req->size;
           $data->total=$req->total;
           $data->user_id=$req->session()->get('user')['id'];
           $data->product_id=$req->product_id;
        //    $product=Product::find($req->product_id);
           if($req->quantity > $req->product_quantity){
            Session::put('error','Quantity is greater than in the stock');
            return back();
            // return "Quantity is greater than in the stock";
           }
           else{
            $data->save();
            Session::put('success','Added to cart Successfully');
            return back();
           }
        }
        else{
            Session::put('error','Please login to add product in cart');
            return redirect('user_login');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {   
        
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
        $data=Cart::where('product_id',$id)->first();
        $data->delete();
        Session::put('success','Product has been removed successfully');
        return back();
    }
    public function changeQuantity(Request $request)
    {   
        $data= Cart::find($request->id);
        $product=Product::find($data->product_id);
        $data->quantity = $request->value;
        $data->total= $product->price * $request->value;
        $data->update();
        
        return response()->json(['data'=>'Quantity changed Successfully.']);
        return redirect('cart/details');
    }
    public function changeSize(Request $request)
    {   
        $data= Cart::find($request->id);
        $data->size = $request->value;
        $data->update();
        
        return response()->json(['data'=>'Size changed Successfully.']);
        return redirect('cart/details');
    }
}
