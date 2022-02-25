<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
use App\Models\Subcategory;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function addCategory(Request $req)
    {
        $data= new Category;
        $data->name=$req->name;
        $data->save();
        Session::put('success','Category has been added successfully');
        return redirect('category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addSubCategory(Request $req,$id)
    {
        $data= new Subcategory;
        $data->name=$req->name;
        $data->category_id=$req->category_id;
        $data->save();
        Session::put('success','Sub-Category has been added successfully');
        return redirect('sub_category/'.$id);
    }
    public function viewSubCategory($id)
    {
        $category=Category::find($id);
        $subcategory=Subcategory::where('category_id',$id)->get();
        return view('admin/sub-category',compact("category","subcategory"));
    }
    public function show()
    {
        $data=Category::all();
        return view('admin/category',['category'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {   
        $category= Category::find($id);
        return view('admin/edit-category',compact("category"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(Request $req)
    {
        $data= Category::find($req->id);
        $data->name=$req->name;
        $data->save();
        Session::put('success','Category has been updated successfully');
        return redirect('category');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        $data=Category::find($id);
        $data->delete();
        Session::put('success','Category has been removed successfully');
        return redirect('category');
    }
    public function destroySubcategory($id)
    {
        $data=Subcategory::find($id);
        $cid=$data->category_id;
        $data->delete();
        Session::put('success','Sub-Category has been removed successfully');
        return redirect('sub_category/'.$cid);
    }
    public function updateSubcategory($id)
    {
        $subcategory= Subcategory::find($id);
        $cid=$subcategory->category_id;
        $category=Category::find($cid);
        return view('admin/edit-subcategory',compact("subcategory","category"));
    }
    public function editSubcategory(Request $req)
    {
        $data= Subcategory::find($req->id);
        $cid=$data->category_id;
        $data->name=$req->name;
        $data->save();
        Session::put('success','Sub-Category has been updated successfully');
        return redirect('sub_category/'.$cid);
    }
}
