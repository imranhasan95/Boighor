<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Slider;
use App\Category;
use App\Like;
use App\Invoice;
use App\Product;

class BackaboutControlle extends Controller
{

    function backabout()
      {
        // $item_count = Invoice::find('product_id');
         // $userss = Product::where('id', '!=', $item_count)->get();
         $userss = Product::all();


        return view('bestseller', [
          'userss' => $userss,
        ]);
      }

}
