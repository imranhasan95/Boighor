<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;
use App\Http\Requests\PasswoedValidation;

class UserController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    function profile()
      {
        return view('profile.index');
      }

    function passwordchange(PasswoedValidation $request)
      {
        $user_id = Auth::id();
        $from_db = User::find($user_id)->password;
        if (Hash::check($request->old_password, $from_db )) {
          User::find($user_id)->update([
            'password' => Hash::make($request->new_password)
          ]);
        }
        return back()->with('status', 'Password Change Successfully!');
      }
}
