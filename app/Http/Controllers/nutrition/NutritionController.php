<?php

namespace App\Http\Controllers\nutrition;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nutrition;

class NutritionController extends Controller
{
    public function nutrition()
    {
       return response()->json(Nutrition::get(),200);
    }
    public function show($id)
    {
        $nutrition = Nutrition::find($id);
        if(is_null($nutrition)){
          return response()->json('Record not found!',404);
       }
        return response()->json(Nutrition::find($id),200);
    }

    public function store(Request $request)
    {
        $nutrition = Nutrition::create($request->all());
        return response()->json($nutrition,201);
    }
    public function update(Request $request,$id)
    {
        $nutrition = Nutrition::find($id);
        if(is_null($nutrition)){
            return response()->json('Record not found!',404);
         }
         
        $nutrition->productname = $request->input('productname'); 
        $nutrition->calories = $request->input('calories');
        $nutrition->fat = $request->input('fat');
        $nutrition->sodium = $request->input('sodium');
        $nutrition->protein = $request->input('protein');
        $nutrition->sugar = $request->input('sugar');
        $nutrition->vitamin = $request->input('vitamin');
        $nutrition->save();
        return response()->json($nutrition,200);
    }
    
    public function destroy($id)
    {
        $nutrition = Nutrition::find($id);
        $nutrition->delete();
        return response()->json($nutrition);
        //return response()->json(null,204);
    }
}
