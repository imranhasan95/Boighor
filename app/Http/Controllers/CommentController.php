<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;
use App\Post;
use App\Blog;
use App\Blogcategory;
use App\User;
use Carbon\Carbon;
use save;

class CommentController extends Controller
{

  public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('checkrole');
    }

  public function comment(Request $request)
       {

         $request->validate([
               'comment_body'=>'required',
           ]);

           $input = $request->all();
           $input['user_id'] = auth()->user()->id;

           Comment::create($input);

           return back();

       }

 public function commentreply(Request $request)
     {
         // $reply = new Comment();
         //
         // $reply->comment = $request->get('comment');
         //
         // $reply->user()->associate($request->user());
         //
         // $reply->parent_id = $request->get('comment_id');
         //
         // $post = Post::find($request->get('post_id'));
         //
         // $post->comments()->save($reply);
         //
         // return back();

     }

          // function blogdetails($blog_id, $blog_slug)
          //   {
          //
          //     $blog_info = Blog::find($blog_id);
          //     $blogcategor = Blogcategory::all();
          //
          //     return view('blogdetails', [
          //       'blog_info' => $blog_info,
          //       'blogcategor' => $blogcategor,
          //
          //     ]);
          //   }
}
