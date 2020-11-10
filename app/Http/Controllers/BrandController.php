<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = Brand::all();
        return view('backend.brand.index',compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => 'required',
            "photo" => "required|mimes:jpeg,bmp,png", // a.jpg 
        ],[
            "name.required" => "Pleace Enter Brand Name"
        ]);
        // If include file, upload
        if($request->file()) {
            // 624872374523_a.jpg
            $fileName = time().'_'.$request->photo->getClientOriginalName();
            // itemimg/624872374523_a.jpg
            $filePath = $request->file('photo')->storeAs('brandimg', $fileName, 'public');
            $path = '/storage/'.$filePath;
        }
        // Object Relational Mapping (Eloquent ORM)
        $brand = new Brand;
        $brand->name = $request->name;
        $brand->photo = $path;
        $brand->save();
        return redirect()->route('brands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return view('backend.brand.show',compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('backend.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            "name" => 'required',
            "photo" => "required|mimes:jpeg,bmp,png", // a.jpg 
        ],[
            "name.required" => "Pleace Enter Brand Name"
        ]);
        // If include file, upload
        if($request->file()) {
            // 624872374523_a.jpg
            $fileName = time().'_'.$request->photo->getClientOriginalName();
            // itemimg/624872374523_a.jpg
            $filePath = $request->file('photo')->storeAs('brandimg', $fileName, 'public');
            $path = '/storage/'.$filePath;
        }
        // Object Relational Mapping (Eloquent ORM)
        $brand->name = $request->name;
        $brand->photo = $path;
        $brand->save();
        return redirect()->route('brands.index');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brands.index');
    }
}
