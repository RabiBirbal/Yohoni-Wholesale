<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use App\Models\User;
use App\Models\Category;
use App\Models\Order;
use App\Models\Order_product;
use App\Models\Product;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $req)
    {
        if(Session::has('user')){
            $user_id=session()->get('user')['id'];
            }
            else{
                $user_id="";
            }
        $order=Order::where('user_id',$user_id)->orderBy('id','desc')->get();
        $cart= Cart::where('user_id',$user_id)->count();
        $category=Category::all();
        $user=User::find($user_id);

        return view('frontend/orders',compact("order","cart","category","user"));
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
        $data=new Order();
        $data->user_id=$request->Session()->get('user')['id'];
        $data->delivery_address=$request->delivery_address;
        $data->map=$request->map;
        $data->total_bill=$request->totalBill;

        $data->save();

        $user_id=session()->get('user')['id'];

        $cart=Cart::where('user_id',$user_id)->get();
        foreach ($cart as $cartData) {
            $product=Product::find($cartData->product_id);
            $product->product_quantity=$product->product_quantity-$cartData->quantity;
            $product->update();
        }
        
        $cartItems=Cart::where('user_id',$user_id)->get();
        foreach($cartItems as $item) { 
            Order_product::create([
                'order_id' => $data->id,
                'product_id' => $item->product_id,
                'ordered_size' => $item->size,
                'quantity' => $item->quantity,
                'total' => $item->total,
            ]);
        }
        Cart::destroy($cartItems);
        Session::put('success','Order Placed Successfully');
        return redirect('/orders');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $order=Order::orderBy('id','desc')->get();
        return view('admin/order',compact("order"));
    }

    public function showDetail($id)
    {
        $order=Order::find($id);
        $user=User::find($order->user_id);
        $orderProduct=DB::table('order_products')
        ->join('products','order_products.product_id','=','products.id')
        ->where('order_products.order_id',$order->id)
        // ->select('products.*')
        ->get();
        // $orderProduct=Order_product::where('order_id','$order->id')->get();

        return view('admin/order-detail',compact("order","user","orderProduct"));
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

    public function showOrderDetail($id)
    {
        $order=Order::find($id);
        $user=User::find($order->user_id);
        $orderProduct=DB::table('order_products')
        ->join('products','order_products.product_id','=','products.id')
        ->where('order_products.order_id',$order->id)
        // ->select('products.*')
        ->get();
        // $orderProduct=Order_product::where('order_id','$order->id')->get();
        if(Session::has('user')){
            $user_id=session()->get('user')['id'];
            }
            else{
                $user_id="";
            }
        $cart= Cart::where('user_id',$user_id)->count();
        $category=Category::all();
        return view('frontend/order-details',compact("order","user","orderProduct","cart","category"));
    }

    public function changeStatus(Request $request)
    {   
        $data= Order::find($request->id);
        $data->status = $request->value;
        $data->save();
        return response()->json(['data'=>'Status changed Successfully.']);

    }

    public function cancelOrder(Request $request)
    {
        $data= Order::find($request->orderId);
        $data->status = "2";
        $data->save();
        return back();
    }
}
