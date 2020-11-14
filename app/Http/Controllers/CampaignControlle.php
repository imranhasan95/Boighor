<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campaign;

class CampaignControlle extends Controller
{
    function campaign()
      {
        $info_alls = Campaign::all();

          return view('campaign', [
            'info_alls' => $info_alls,
          ]);
      }
}
