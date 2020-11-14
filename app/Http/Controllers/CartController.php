<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use App\Coupon;
use Carbon\Carbon;
// use Auth;

class CartController extends Controller
{

  function cart($coupon_name = "")
    {
      if ($coupon_name == "") {
        $coupon_discount = 0;

        return view('cart', [
          'coupon_discount' => $coupon_discount,
          'coupon_name' => $coupon_name,
        ]);

      }
      else {
        if (Coupon::where('coupon_name', $coupon_name)->exists()) {
          $coupon_validate = Coupon::where('coupon_name', $coupon_name)->first()->coupon_validation;
          $today = Carbon::now();
          if ($coupon_validate > $today) {
            $coupon_discount = Coupon::where('coupon_name', $coupon_name)->first()->discount_amount;
          }
          else {
            return back()->withErrors($coupon_name. 'Coupon Exprired!');
          }
        }
        else {
          return back()->withErrors('Coupon value Invalid!');
        }
        return view('cart', [
          'coupon_discount' => $coupon_discount,
          'coupon_name' => $coupon_name,
        ]);
      }
    }

  function cartremove($cart_id)
    {
      Cart::find($cart_id)->delete();
      return back();
    }

  function cartupdate(Request $request)
    {
      foreach ($request->cart_id as $key => $value) {
        $cart_id = $value;
        $product_id = Cart::find($value)->product_id;
        $update_amt = $request->cart_amount[$key];
        $avilealbal_qty = Product::find(Cart::find($value)->product_id)->product_quantity;

        if ($avilealbal_qty >= $update_amt) {
          Cart::find($value)->update([
            'quantity' => $update_amt
          ]);
        }
      }
      return back();
    }


    function addtocart(Request $request)
    {
      $mac_address = exec('getmac');
      $mac = strtok($mac_address, ' ');

      $able_qty = Product::find($request->product_id)->product_quantity;
      $cart_info = Cart::where('mac', $mac)->where('product_id', $request->product_id)->first();

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
