<?php

namespace App\Http\Controllers\blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function blog()
    {
       return response()->json(Blog::get(),200);
    }
    public function show($id)
    {
        $blog = Blog::find($id);
        if(is_null($blog)){
          return response()->json('Record not found!',404);
       }
        return response()->json(Blog::find($id),200);
    }

    public function store(Request $request)
    {
        $blog = Blog::create($request->all());
        return response()->json($blog,201);
    }
    public function update(Request $request,$id)
    {
        $blog = Blog::find($id);
        if(is_null($blog)){
            return response()->json('Record not found!',404);
         }
        $blog->id = $request->input('id'); 
        $blog->type = $request->input('type');
        $blog->author = $request->input('author');
        $blog->title = $request->input('title');
        $blog->detail = $request->input('detail');
        $blog->postdate = $request->input('postdate');
        $blog->save();
        return response()->json($blog,200);
    }
    
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return response()->json($blog);
        //return response()->json(null,204);
    }
}