<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use Auth;

class AboutControlle extends Controller
{
    function about()
    {
      $teamlists = Team::WHERE('id', '<', 4)->get();
      return view('about',[
        'teamlists' => $teamlists,
      ]);
    }
}
