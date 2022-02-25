<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Banner;

class BannerController extends Controller
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
    public function addBanner(Request $req)
    {
        $data= new Banner;
        $data->category="Main Banner";
        if($req->hasfile('banner')){
            $file=$req->file('banner');
            $extension=$file->getClientOriginalExtension(); //getting image extension
            $filename=time().'.'.$extension;
            $file->move('upload/images/',$filename);
            $data->banner_image=$filename;
        }
        else{
            return $req;
            $data->banner_image='';
        }
        $data->save();
        Session::put('success','Banner has been added successfully');
        return redirect('banner_management');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $banner=Banner::where('category','Main Banner')->get();
        $banner1=Banner::where('category','Middle Banner')->get();
        $banner2=Banner::where('category','Lower Banner')->get();
        // return view('admin/banner',['banner'=>$data]);
        return view('admin/banner',compact("banner","banner1","banner2"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addMiddleBanner(Request $req)
    {
        $data= Banner::find(1);
        if($req->hasfile('banner')){
            $file=$req->file('banner');
            $extension=$file->getClientOriginalExtension(); //getting image extension
            $filename=time().'.'.$extension;
            $file->move('upload/images/',$filename);
            $data->banner_image=$filename;
        }
        else{
            return $req;
            $data->banner_image='';
        }
        $data->save();
        Session::put('success','Middle Banner has been added successfully');
        return redirect('banner_management');
    }

    public function addLowerBanner(Request $req)
    {
        $data= Banner::find(2);
        if($req->hasfile('banner')){
            $file=$req->file('banner');
            $extension=$file->getClientOriginalExtension(); //getting image extension
            $filename=time().'.'.$extension;
            $file->move('upload/images/',$filename);
            $data->banner_image=$filename;
        }
        else{
            return $req;
            $data->banner_image='';
        }
        $data->save();
        Session::put('success','Lower Banner has been added successfully');
        return redirect('banner_management');
    }

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
        $data=Banner::find($id);
        $data->delete();
        Session::put('success','Banner has been removed successfully');
        return redirect('banner_management');
    }
}
