<?php

namespace App\Http\Controllers;
use App\Brand;
use App\Subcategory;
use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Item::all();
        return view('backend.item.index',compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = Brand::all();
        $subcategory = Subcategory::all();
        return view('backend.item.create',compact('brand','subcategory'));
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
            "codeno" => '',
            "name" => 'required',
            "photo" => "required|mimes:jpeg,bmp,png", // a.jpg
            "price" => 'required',
            "discount" => '',
            "description" => 'required',
            "brand_id" => 'required',
            "subcategory_id" => 'required', 
        ],[
            "name.required" => "Pleace Enter Item Name"
        ]);
        // If include file, upload
        if($request->file()) {
            // 624872374523_a.jpg
            $fileName = time().'_'.$request->photo->getClientOriginalName();
            // itemimg/624872374523_a.jpg
            $filePath = $request->file('photo')->storeAs('itemimg', $fileName, 'public');
            $path = '/storage/'.$filePath;
        }
        // Object Relational Mapping (Eloquent ORM)
        $item = new Item;
        $item->codeno = uniqid();
        $item->name = $request->name;
        $item->photo = $path;
        $item->price = $request->price;
        $item->discount = $request->discount;
        $item->description = $request->description;
        $item->brand_id = $request->brand_id;
        $item->subcategory_id = $request->subcategory_id;
        $item->save();
        return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        $brand = Brand::all();
        $subcategory = Subcategory::all();
        return view('backend.item.show',compact('item','brand','subcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $brand = Brand::all();
        $subcategory = Subcategory::all();
        return view('backend.item.edit',compact('item','brand','subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            "codeno" => '',
            "name" => 'required',
            "photo" => "required|mimes:jpeg,bmp,png", // a.jpg
            "price" => 'required',
            "discount" => '',
            "description" => 'required',
            "brand_id" => 'required',
            "subcategory_id" => 'required', 
        ],[
            "name.required" => "Pleace Enter Item Name"
        ]);
        // If include file, upload
        if($request->file()) {
            // 624872374523_a.jpg
            $fileName = time().'_'.$request->photo->getClientOriginalName();
            // itemimg/624872374523_a.jpg
            $filePath = $request->file('photo')->storeAs('itemimg', $fileName, 'public');
            $path = '/storage/'.$filePath;
        }
        // Object Relational Mapping (Eloquent ORM)
        $item->codeno = uniqid();
        $item->name = $request->name;
        $item->photo = $path;
        $item->price = $request->price;
        $item->discount = $request->discount;
        $item->description = $request->description;
        $item->brand_id = $request->brand_id;
        $item->subcategory_id = $request->subcategory_id;
        $item->save();
        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index');
    }
}
