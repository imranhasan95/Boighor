<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Blogcategory;
use App\Blog;
use App\Comment;
use App\Post;
use Carbon\Carbon;
use Auth;
use Image;



class BlogControlle extends Controller
{

      function blog()
        {
          $blogalls = Blog::all();
          $blogcategor = Blogcategory::all();
          $comments = Comment::all();

          $commen = Comment::where('id', '<=', 5)->get();
          $new_id = Blog::latest()->first()->id;
          $new_blog = Blog::where('id', $new_id)->get();

          return view('blog', [
            'blogalls' => $blogalls,
            'blogcategor' => $blogcategor,
            'comments' => $comments,
            'commen' => $commen,
            'new_blog' => $new_blog,
          ]);
        }

    function blogdetails($blog_id, $blog_slug)
      {
        $blog_info = Blog::find($blog_id);
        $blogcategor = Blogcategory::all();
        $count = Comment::find('id');
        $count_info = Comment::where('parent_id', $count)->count();
        $comments = Comment::all();
        $commen = Comment::where('id', '<=', 4)->get();
        $comfo = Comment::latest()->first()->id;;
        $commen_info = Comment::where('id', '>=', $comfo)->get();

        $new_id = Blog::latest()->first()->id;
        $new_blog = Blog::where('id', '>=', $new_id)->get();
        $posts = Post::all();

        return view('blogdetails', [
          'blog_info' => $blog_info,
          'blogcategor' => $blogcategor,
          'comments' => $comments,
          'commen' => $commen,
          'new_blog' => $new_blog,
          'posts' => $posts,
          'count_info' => $count_info,
          'commen_info' => $commen_info,
        ]);
      }

}
