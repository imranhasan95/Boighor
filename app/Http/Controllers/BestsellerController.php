<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BestsellerController extends Controller
{
  function bestseller()
    {
      return view('bestseller');
    }
}
