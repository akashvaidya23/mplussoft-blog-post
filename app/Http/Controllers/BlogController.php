<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::with(['category','user'])->paginate(100);
        return view('blogs.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('name','id');
        return view('blogs.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $image = $request->file('blog_image');
        $name_image = hexdec(uniqid());
        $img_ext = strtolower($image->getClientOriginalExtension());
        $photo = $name_image.'.'.$img_ext;
        $up_location = 'images/photos/';
        $last_image = $photo;
        $image->move($up_location,$photo);

        $blog = new Blog;
        $blog->name = $request->name;
        $blog->image = $last_image;
        $blog->category_id= $request->category;
        $blog->description = $request->description;
        $blog->added_by = Auth::user()->id;
        $blog->created_at = $request->date;
        $blog->save();

        return redirect('blog')->with("message","Blog Saved Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        $blog = Blog::with(['user'])->find($blog->id);
        return view('blogs.view',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $blog = Blog::find($blog->id);
        $categories = Category::pluck('name','id');
        return view('blogs.edit',compact('categories','blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        if($request->file('blog_image')) {
            $image = $request->file('blog_image');
            $name_image = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $photo = $name_image.'.'.$img_ext;
            $up_location = 'images/photos/';
            $last_image = $photo;
            $image->move($up_location,$photo);
        } else {
            $last_image = "";
        }

        $blog = Blog::find($blog->id);
        $blog->name = $request->name;
        if($last_image) {
            $blog->image = $last_image;
        }
        $blog->category_id= $request->category;
        $blog->description = $request->description;
        $blog->created_at = $request->date;
        $blog->save();
        return redirect('blog');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        Blog::find($blog->id)->delete();
        return redirect()->back()->with("alert","Blog deleted Successfully");
    }
}
