<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Slider;
use App\Category;
use App\Like;
use App\Invoice;
use App\Blog;
use App\Comment;

class FrontendController extends Controller
{
    public function index ()
    {
      $products =Product::all();
      $sliders =Slider::all();
      $categores =Category::all();
      $Likes =Like::all();
      // $invoices =Invoice::all();
      $blogalls = Blog::all();
      $count = Comment::find('id');
      $count_info = Comment::where('parent_id', $count)->count();
      $item_count = Invoice::find('product_id');
       $invoices = Product::where('id','!=', $item_count)->get();



      return view('welcome',[
        'products' => $products,
        'sliders' => $sliders,
        'categores' => $categores,
        'Likes' => $Likes,
        'invoices' => $invoices,
        'blogalls' => $blogalls,
        'count_info' => $count_info,
      ]);
    }
}
