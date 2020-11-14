<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coupon;
use Str;
use Carbon\Carbon;

class CouponController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('checkrole');
    }


    function coupon()
    {
      $carbons = Coupon::all();
      // return view('coupon.index');
      return view('coupon.index', [
        'carbons' => $carbons,
      ]);
    }

    function couponstore(Request $request)
    {
      $request->validate([
        'coupon_name' => 'required|unique:coupons,coupon_name',
        'coupon_validation_date' => 'required',
        'coupon_validation_time' => 'required',
      ]);

      $coupon_validation = $request->coupon_validation_date." ".$request->coupon_validation_time.":00";

      if (Str::endsWith($request->discount_amount, '%')) {
        if (Str::before($request->discount_amount, '%') < 100) {
          $main_valu = Str::before($request->discount_amount, '%');
          if (is_numeric($main_valu)) {
            Coupon::insert([
              'coupon_name' => $request->coupon_name,
              'discount_amount' => $request->discount_amount,
              'coupon_validation' => $coupon_validation,
              'created_at' => Carbon::now()
            ]);
          }
          else {
            return back()->withErrors('Coupon value must be number');
          }
        }
        else {
          return back()->withErrors('100 theke boro!');
        }
      }
      else {
        if (is_numeric($request->discount_amount)) {
          Coupon::insert([
            'coupon_name' => $request->coupon_name,
            'discount_amount' => $request->discount_amount,
            'coupon_validation' => $coupon_validation,
            'created_at' => Carbon::now()
          ]);
        }
        else {
          return back()->withErrors('Coupon value must be number');
        }
      }
      return back()->with('status', 'Coupon Added successfully!');
    }
}
