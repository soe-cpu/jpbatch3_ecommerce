<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('backend.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
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
        $image = $request->file('photo');
        $new_name = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('/backend_asset/images/category/'),$new_name);
        $category = new Category;
        $category->name = $request->name;
        $category->photo = $path;
        $category->save();
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('backend.category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('backend.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
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
        $image = $request->file('photo');
        $new_name = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('/backend_asset/images/category/'),$new_name);
        $category->name = $request->name;
        $category->photo = $path;
        $category->save();
        return redirect()->route('categories.index'); 
           }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
