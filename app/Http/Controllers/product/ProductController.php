<?php

namespace App\Http\Controllers\product;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product()
    {
       return response()->json(Product::get(),200);
    }
    public function show($id)
    {
        $product = Product::find($id);
        if(is_null($product)){
          return response()->json('Record not found!',404);
       }
        return response()->json(Product::find($id),200);
    }
    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return response()->json($product,201);
    }
    public function update(Request $request,$id)
    {
        $product = Product::find($id);
        if(is_null($product)){
            return response()->json('Record not found!',404);
         }    
        $product->category_id = $request->input('category_id'); 
        $product->name = $request->input('name');
        $product->image = $request->input('image');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->save();
        return response()->json($product,200);
    }
      public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json($product);
        //return response()->json(null,204);
    }
}
