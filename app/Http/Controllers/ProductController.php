<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index' , compact('products'));
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
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {

        $data = [];
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;

        if($request->file('photo')){
            $file = $request->file('photo');
            
            $image = explode(".",$file->getClientOriginalName());
            $newName = date('Ymdhi.').$image[1];

            move_uploaded_file($_FILES['photo']['tmp_name'], public_path('uploads/product_images/'.$newName));
            $data['product_image'] = $newName;

            }
        $product = Product::create($data);
        return redirect()->route('products.index')->with('adding', 'تم اضافة العنصر بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $id = $request->id;
        $admin = Product::findOrFail($id);
        $data = [];
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        if($request->file('photo')){
            $file = $request->file('photo');
            $image = explode(".",$file->getClientOriginalName());
            $newName = date('Ymdhi.').$image[1];

            move_uploaded_file($_FILES['photo']['tmp_name'], public_path('uploads/product_images/'.$newName));
            $data['product_image'] = $newName;

            }
        $product = Product::whereId($id)->update($data);
        return redirect()->route('products.index')->with('adding', 'تم اضافة العنصر بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // return $request;
        $id = $request->id;
        $admin = Product::findOrFail($id);
        $admin->delete();
        return redirect()->route('products.index')->with('delete', 'تم حذف العنصر بنجاح');
    }
}
