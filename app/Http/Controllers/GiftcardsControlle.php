<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Giftcards;

class GiftcardsControlle extends Controller
{
    function giftcards()
      {
        $card_infos = Giftcards::all();
        return view('giftcard', [
          'card_infos' => $card_infos,
        ]);
      }
}
