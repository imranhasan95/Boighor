<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Sale;
use App\Invoice;
use App\Product;
use Carbon\Carbon;
use Session;
use Stripe;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe(Request $request)
    {
        return view('payment.stripe', [
        'ultimate_final_amount' => $request->ultimate_final_amount,
        'all_previos_data' => $request->all()
      ]);
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $request->ultimate_final_amount * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "payment from Boighor.com."
        ]);

        Session::flash('success', 'Payment successful!');

            $all_previos_data_array = json_decode($request->all_previos_data, true);
            $sale_id = Sale::insertGetId([
              'user_id' => Auth::id(),
              'cart_subtotal' => getcartaddprice(),
              'coupon_name' => $all_previos_data_array['coupon_name'],
              'total__amount' => $all_previos_data_array['order_total'],
              'shipping_rate' => $all_previos_data_array['shipping_rate'],
              'payment_method' => 1,
              'created_at' => Carbon::now()
            ]);

            foreach (getcartaddproducts() as $key => $value) {
              //insert to invoice table.
            Invoice::insert([
              'sale_id' => Auth::id(),
              'user_id' => $sale_id,
              'product_id' => $value->product_id,
              'quantity' => $value->quantity,
              'created_at' => Carbon::now()
            ]);
            //decrement in product table.
            Product::find($value->product_id)->decrement('product_quantity', $value->quantity);
            $value->delete();
            }

        // return redirect('cart');
    }
}
