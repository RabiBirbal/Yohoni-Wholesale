<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Cart;
use App\Models\User;
use DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name)
    {   
        $test = str_replace("-", " ", $name);
        $data=Subcategory::where('name',$test)->first();
        $category1=Category::find($data->category_id);
        $products=Product::where('subcategory',$test)->orderBy('id','desc')->get();
        $subcategory1=Subcategory::where('name',$test)->first();
        $subcategory=Subcategory::where('category_id',$subcategory1->category_id)->get();
        if(Session::has('user')){
            $user_id=session()->get('user')['id'];
            }
            else{
                $user_id="";
            }
        $cart= Cart::where('user_id',$user_id)->count();
        $category=Category::all();
        $user=User::find($user_id);

        return view("frontend/subcategory-product",compact("products","subcategory","cart","category","category1","user"));
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
    public function addProduct(Request $req)
    {   
        // dd($req->size);
        $data= new Product;
        $data->name=$req->name;
        $data->product_quantity=$req->quantity;
        
        if($data->size != null){
            $string=implode(",",$req->size);
            $data->available_size = $string;
        }
        
        $data->category=$req->category;
        $data->subcategory=$req->subcategory;
        $data->price=$req->price;
        $data->offer=$req->offer;
        $data->previous_price=$req->oprice;
        $data->description=$req->description;
        if($req->hasfile('product-img')){
            $file=$req->file('product-img');
            $extension=$file->getClientOriginalExtension(); //getting image extension
            $filename=time().'.'.$extension;
            $file->move('upload/images/',$filename);
            $data->product_image=$filename;
        }
        else{
            return $req;
            $data->product_image='';
        }
        $data->save();
        Session::put('success','Product has been added successfully');
        return redirect('product_details');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $category=Category::all();
        $subcategory=Subcategory::all();
        $user_id=session()->get('user')['id'];
        $user=User::find($user_id);

        return view('admin/add-product',compact("category","subcategory","user"));
    }
    public function showProduct(Request $request)
    {
        // if ($request->ajax()) {
        //     $data = Product::latest()->get();
        //     return Datatables::of($data)
        //         ->addIndexColumn()
        //         ->addColumn('action', function($row){
        //             $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
        //             return $actionBtn;
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }
        
        // return view('users');
        $product=Product::orderBy('id','desc')->get();
        $category=Category::all();
        $subcategory=Subcategory::all();
        return view('admin/product-details',compact("product","category","subcategory"));
    }
    public function showProductDetail($name,$id)
    {
        $product=Product::find($id);
        $size=explode(",",$product->available_size);
        if(Session::has('user')){
            $user_id=session()->get('user')['id'];
            }
            else{
                $user_id="";
            }
        $category=Category::all();
        $cart= Cart::where('user_id',$user_id)->count();
        $user=User::find($user_id);

        return view('frontend/product-details',compact("product","cart","category","size","user"));
    }
    // public function showHomeAppliance()
    // {
    //     $home_appliance=Product::where('category','Home Appliance')->get();
    //     $user_id=session()->get('user')['id'];
    //     $cart= Cart::where('user_id',$user_id)->count();

    //     return view('frontend/home-appliance',compact("home_appliance","cart"));
    // }
    // public function showFurniture()
    // {
    //     $furniture=Product::where('category','Furniture')->get();
    //     $user_id=session()->get('user')['id'];
    //     $cart= Cart::where('user_id',$user_id)->count();

    //     return view('frontend/furniture',compact("furniture","cart"));
    // }
    // public function showElectric()
    // {
    //     $electric=Product::where('category','Electric')->get();
    //     $user_id=session()->get('user')['id'];
    //     $cart= Cart::where('user_id',$user_id)->count();

    //     return view('frontend/electric',compact("electric","cart"));
    // }
    // public function showClothing()
    // {
    //     $clothing=Product::where('category','Clothing')->get();
    //     $category=Category::where('name','Clothing')->first();
    //     $subcategory=Subcategory::where('category_id',$category->id)->get();;
    //     $user_id=session()->get('user')['id'];
    //     $cart= Cart::where('user_id',$user_id)->count();

    //     return view('frontend/cloth',compact("clothing","subcategory","cart"));
    // }
    // public function showMobile()
    // {
    //     $mobile=Product::where('category','Mobile')->get();
    //     $user_id=session()->get('user')['id'];
    //     $cart= Cart::where('user_id',$user_id)->count();

    //     return view('frontend/mobile',compact("mobile","cart"));
    // }
    // public function showRo()
    // {
    //     $ro=Product::where('category','RO Water Purifier')->get();
    //     $user_id=session()->get('user')['id'];
    //     $cart= Cart::where('user_id',$user_id)->count();

    //     return view('frontend/RO',compact("ro","cart"));
    // }
    // public function showFootwear()
    // {
    //     $footwear=Product::where('category','Footwear')->get();
    //     $user_id=session()->get('user')['id'];
    //     $cart= Cart::where('user_id',$user_id)->count();

    //     return view('frontend/footwear',compact("footwear","cart"));
    // }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req)
    {
        $data= Product::find($req->id);
        $data->name=$req->name;
        $data->product_quantity=$req->quantity;
        $data->category=$req->category;
        $data->subcategory=$req->subcategory;
        $data->price=$req->price;
        $data->offer=$req->offer;
        $data->previous_price=$req->oprice;
        $data->description=$req->description;
        $data->save();
        Session::put('success','Product has been updated successfully');
        return redirect('product_details');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {   
        $product= Product::find($id);
        $category=Category::all();
        $subcategory=Subcategory::all();
        return view('admin/edit-product',compact("product","category","subcategory"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Product::find($id);
        $data->delete();
        Session::put('success','Product has been removed successfully');
        return redirect('product_details');
    }

    public function show1($name)
    {   
        $test = str_replace("-", " ", $name);
        $categoryName=$test;
        $product=Product::where('category',$test)->orderBy('id','desc')->get();
        $category1=Category::where('name',$test)->first();
        $subcategory=Subcategory::where('category_id',$category1->id)->get();;
        $category=Category::all();

        if(Session::has('user')){
            $user_id=session()->get('user')['id'];
            }
            else{
                $user_id="";
            }
        $cart= Cart::where('user_id',$user_id)->count();
        $user=User::find($user_id);

        return view('frontend/products',compact("product","category1","category","subcategory","cart","categoryName","user"));
    }
}
