<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

class TeamControlle extends Controller
{
    function team()
      {
        $teamlists = Team::all();
          return view('team', [
            'teamlists' => $teamlists,
          ]);
      }


}
