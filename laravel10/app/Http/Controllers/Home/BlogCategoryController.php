<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\MultiImage;
use Image;

class BlogCategoryController extends Controller
{
    public function AllBlogCategory()
    {
        $blogcategory = BlogCategory::latest()->get(); // get the db homeslide  
        return view('admin.blog_category.blog_category_all', compact('blogcategory'));
    } // End Method 
}
