<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Giftcards;
use Carbon\Carbon;
use Auth;
use Image;

class GiftcarControlle extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('checkrole');
    }

  function giftcar()
    {
    $card_info = Giftcards::all();
    
    return view('giftcar.index',[
      'card_info' => $card_info,
    ]);

    }

    function giftcarinsurt(Request $request)
        {
        $insers_Id = Giftcards::insertGetId([
            'giftcar_name' => $request->giftcar_name,
            'giftcar_price' => $request->giftcar_price,
            'created_at' => Carbon::now()
        ]);

        if ($request->hasFile('giftcar_images')) {
            $giftcar_photo = $request->file('giftcar_images');
            $filename = $insers_Id . '.' . $giftcar_photo->getClientOriginalExtension();
            Image::make($giftcar_photo)->resize(370, 200)->save( base_path('public/uploads/giftcar_photo/' . $filename ),40 );
            Giftcards::findOrFail($insers_Id)->update([
                'giftcar_images' => $filename,
            ]);
        }

            return back()->with('status', 'Giftcar insert successfully!');
        }
}
