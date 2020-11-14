<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;


class ShopController extends Controller
{
    function shop()
    {
      $products = Product::all();
      $categores = Category::all();

      $new_id = Product::latest()->first()->product_photo;
      $new_products = Product::where('id', $new_id)->get();

      return view('shop',[
        'products' => $products,
        'categores' => $categores,
        'new_products' => $new_products,

      ]);
    }
}
