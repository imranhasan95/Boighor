<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Like;
use Auth;
use Carbon\Carbon;

class LikeController extends Controller
{

     function actOnlike(Request $request, $id)
      {
          $action = $request->get('action');
          switch ($action) {
              case 'Like':
                  Like::where('id', $id)->increment('likes_count');
                  break;
              case 'Unlike':
                  Like::where('id', $id)->decrement('likes_count');
                  break;
          }
          event(new LikeAction($id, $action));
          return '';

      }
}
