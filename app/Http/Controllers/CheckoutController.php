<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\City;
use App\Coupon;

class CheckoutController extends Controller
{
      function checkout($coupon_name = "")
        {
          if ($coupon_name == "") {
            $discount_amount = 0;
          }
          else {
            $discount_amount = Coupon::where('coupon_name', $coupon_name)->first()->discount_amount;
          }
          return view('checkout', [
            "countries" => Country::all(),
            "coupon_name" => $coupon_name,
            "discount_amount" => $discount_amount,
          ]);
        }

      function getcitylist(Request $request)
        {
          $cty_dropdown = '<option value="">Select a country…</option>';
          $cities = City::where('country_id', $request->country_id)->get();
          foreach ($cities as $city) {
            $cty_dropdown .= '<option value="'. $city->id .'">'. $city->name .'</option>';
          }
          echo $cty_dropdown;
        }
}
