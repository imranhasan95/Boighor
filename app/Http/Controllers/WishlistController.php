<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use App\wishlist;
use Carbon\Carbon;

class WishlistController extends Controller
{
    function wishlist()
    {
        return view('wishlist');
    }
    function addtowishlist(Request $request)
      {
        $mac_address = exec('getmac');
        $mac = strtok($mac_address, ' ');

        $able_qty = Product::find($request->product_id)->product_quantity;
        $cart_info = wishlist::where('mac', $mac)->where('product_id', $request->product_id)->first();

        if ($cart_info) {
          $old_cart_qty = $cart_info->quantity;
        }
        else {
          $old_cart_qty = 0;
        }
        if ($able_qty >= ($request->quantity + $old_cart_qty)) {
          if ($cart_info) {
            // code...update
            $cart_info->increment('quantity', $request->quantity);
          }
          else {
            Cart::insert([
              'mac' =>  $mac,
              'product_id' => $request->product_id,
              'quantity' => $request->quantity,
              'created_at' => Carbon::now()
            ]);
          }
        }
        else {
            return back()->with('errorstatus', 'Not Availabae Product Quantity!');
        }

        return back()->with('succssstatus', 'Product Added To Cart successfully!');
      }

}
