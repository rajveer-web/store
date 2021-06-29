<?php

namespace App\Http\Controllers\category;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
       return response()->json(Category::get(),200);
    }
    public function show($id)
    {
        $category = Category::find($id);
        if(is_null($category)){
          return response()->json('Record not found!',404);
       }
        return response()->json(Category::find($id),200);
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());
        return response()->json($category,201);
    }
    public function update(Request $request,$id)
    {
        $category = Category::find($id);
        if(is_null($category)){
            return response()->json('Record not found!',404);
         }
        $category->name = $request->input('name');
        $category->slug = $request->input('name');
        $category->save();
        return response()->json($category,200);
    }
    
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return response()->json($category);
        //return response()->json(null,204);
    }

}
