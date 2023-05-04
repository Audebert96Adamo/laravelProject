<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Blog;
use App\Models\MultiImage;
use Image;

class BlogController extends Controller
{
    public function AllBlog()
    {
        $blogs = Blog::latest()->get();
        return view('admin.blogs.blog_all', compact('blogs'));
    } // End Method 
}
