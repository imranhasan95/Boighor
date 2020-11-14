<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campaign;

class SinglecampaignController extends Controller
{
  public function singlecampaign($campaign_id, $campaign_slug)
    {
      $releted_campaign = Campaign::where('id',  $campaign_id)->get();


      return view('Singlecampaign', [
        'releted_campaign' => $releted_campaign,
      ]);
    }
}
