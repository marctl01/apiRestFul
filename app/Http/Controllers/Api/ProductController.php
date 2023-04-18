<?php

namespace App\Http\Controllers\Api;

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

        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();

        $product->name = $request->name;
        $product->descr = $request->descr;
        $product->price = $request->price;
        $product->cant = $request->cant;
        $product->prov_id = $request->prov_id;
        $product->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $product = Product::findOrFail($request->id);
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->name = $request->name;
        $product->descr = $request->descr;
        $product->price = $request->price;
        $product->cant = $request->cant;
        $product->prov_id = $request->prov_id;
        $product->save();

        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $product = Product::destroy($request->id);
        return $product;
    }
}
