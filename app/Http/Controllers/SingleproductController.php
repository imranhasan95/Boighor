<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Sale;
use App\Invoice;
use Auth;

class SingleproductController extends Controller
{
  public function singleproduct($product_id, $product_slug)
  {
  $product_info = Product::find($product_id);
  $releted_products = Product::where('category_id', $product_info->category_id)->where('id', '!=', $product_id)->get();
  $categores = Category::all();

  $new_id = Product::latest()->first()->product_photo;
  $new_products = Product::where('id', $new_id)->get();
  $item_count = Invoice::find('product_id');
   $userss = Product::where('id', '!=', $item_count)->get();


  return view('singleproduct',[
    'product_info' => $product_info,
    'releted_products' => $releted_products,
    'categores' => $categores,
    'new_products' => $new_products,
    'userss' => $userss,
  ]);
  }

}
