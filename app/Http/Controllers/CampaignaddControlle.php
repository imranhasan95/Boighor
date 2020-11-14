<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campaign;
use Image;
use Carbon\Carbon;

class CampaignaddControlle extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
          $this->middleware('checkrole');
    }

    function campaignadd()
      {
        $info_alls = Campaign::all();
          return view('campaigns.index', [
            'info_alls' => $info_alls,
          ]);
      }

    function campaigninsurt(Request $request)
      {
        $info = Campaign::insertGetId([
                'created_at' => Carbon::now(),
            ]);

        if ($request->hasFile('campaign_images')) {
           $slider_imegrs = $request->file('campaign_images');
           $filename = $info . '.' . $slider_imegrs->getClientOriginalExtension();
            Image::make($slider_imegrs)->resize(1720, 550)->save( base_path('public/uploads/campaign_images/' . $filename ),40 );
            Campaign::findOrFail($info)->update([
                'campaign_images' => $filename,
            ]);
        }

        return back()->with('status', 'Campaign insert  successfully!');

      }
}
