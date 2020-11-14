<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Carbon\Carbon;
use App\Sale;
use App\Invoice;
use Auth;
use PDF;

class CustomerController extends Controller
{
    function customerdashboard()
      {
         $sales = Sale::where('user_id', Auth::id())->get();

        return view('customer.dashboard', [
          'sales' => $sales,
        ]);
      }

      function downloadpdf($sale_id)
        {
          $invoices = Invoice::where('sale_id', $sale_id)->with('relationtoproducttable')->get();
          $pdf = PDF::loadView('pdf.invoice', compact('sale_id', 'invoices'));
          // return $pdf->download('invoice.pdf');
          return $pdf->stream('invoice.pdf');
        }

    function customerregister()
      {
        // echo "string";
        return view('customerregister');
      }

    function customerregisterinsert(Request $request)
      {
        User::insert([
          'name' => $request->name,
          'email' => $request->email,
          'password' => Hash::make($request->password),
          'email_verified_at' => Carbon::now(),
          'role' => 2,
          'created_at' => Carbon::now()
        ]);
        return back()->with('status', 'Your Account Register successfully!');
      }
}
