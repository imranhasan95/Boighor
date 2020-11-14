<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Blogcategory;
use App\Blog;
use Carbon\Carbon;
use Auth;
use Image;

class BloginfoControlle extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('checkrole');
    }
//index
    function blog_details()
        {
        $blog_dts = Blog::all();
        $blogcategorys = Blogcategory::all();

        return view('blog_details.index', [
            'blogcategorys' => $blogcategorys,
            'blog_dts' => $blog_dts,
        ]);
        }
//insurt blog
    function bloginsert(Request $request)
        {
        $inser_Id = Blog::insertGetId([
            'blogcategory_id' => $request->blogcategory_id,
            'blog_name' => $request->blog_name,
            'blog_title' => $request->blog_title,
            'blog_shot_details' => $request->blog_shot_details,
            'blog_long_title' => $request->blog_long_title,
            'blog_long_details' => $request->blog_long_details,
            'created_at' => Carbon::now()
        ]);

        if ($request->hasFile('blog_images')) {
            $blog_photo = $request->file('blog_images');
            $filename = $inser_Id . '.' . $blog_photo->getClientOriginalExtension();
            Image::make($blog_photo)->resize(1170, 788)->save( base_path('public/uploads/blog_photo/' . $filename ),40 );
            Blog::findOrFail($inser_Id)->update([
                'blog_images' => $filename,
            ]);
        }

            return back()->with('status', 'Blog insert successfully!');
        }
//index category
        function blogcategory()
            {
            $blogcategorys = Blogcategory::all();

            return view('category.blogcategory', [
                'blogcategorys' => $blogcategorys,
            ]);

            }
// add category
        function blog_category(Request $request)
            {
            Blogcategory::insert([
                'blogcategory_name' => $request->blogcategory_name,
                'added_by' => Auth::id(),
                'created_at' => Carbon::now(),
            ]);

            return back();
            }
}
