<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $data=Blog::all();
        return view('backend.newblog.index',compact('data'));
    }

    public function create(){
        return view('backend.newblog.create');
    }
    public function store(Request $request){

        Blog::create($request->all());
        return redirect()->route('newblog.index');
    }

    public function show(Blog $blog)
    {
        return view('backend.newblog.show',compact('blog'));
    }
    public function edit(Blog $blog)
    {
       return view('backend.newblog.edit',compact('blog'));
    // return redirect()->route('blog.edit')->with('',$result);
    }
    public function update(Request $request, Blog $blog)
    {

        $blog->update([
          'name'=>$request->name,
          'description'=>$request->description,

        ]);
        return redirect()->route('newblog.index');

    }
    public function destroy(Blog $blog)
    {

        $blog->delete('id', $blog);

        return redirect()->route('newblog.index');
    }
}
