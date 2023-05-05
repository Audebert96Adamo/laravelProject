<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Blog;
use App\Models\BlogCategory;
use Image;

class BlogController extends Controller
{
    public function AllBlog()
    {
        $blogs = Blog::latest()->get();
        return view('admin.blogs.blog_all', compact('blogs'));
    } // End Method 

    public function AddBlog()
    {
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('admin.blogs.blog_add', compact('categories'));
    } // End Method 

    public function StoreBlog(Request $request)
    {
        $request->validate([
            'blog_title' => 'required',
            'blog_category_id' => 'required',
            'blog_image' => 'required',
        ], [
            'blog_title.required' => 'Blog Title is required',
            'blog_image.required' => 'Blog Image is required',
        ]);

        $image = $request->file('blog_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(430, 327)->save('upload/blog/' . $name_gen);
        $save_url = 'upload/blog/' . $name_gen;

        Blog::insert([
            'blog_category_id' => $request->blog_category_id,
            'blog_title' => $request->blog_title,
            'blog_image' => $save_url,
            'blog_tags' => $request->blog_tags,
            'blog_description' => $request->blog_description,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Blog Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog')->with($notification);
    } // End Method 

    public function EditBlog($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('admin.blogs.blog_edit', compact('blog', 'categories'));
    } // End Method 

    public function DeleteBlog($id)
    {
        Blog::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End Method 
}
