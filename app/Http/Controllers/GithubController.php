<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\SentPassword;
use Socialite;
use Hash;
use Str;
use Mail;
use Carbon\Carbon;

class GithubController extends Controller
{
  /**
   * Redirect the user to the GitHub authentication page.
   *
   * @return \Illuminate\Http\Response
   */
  public function redirectToProvider()
  {
      return Socialite::driver('github')->redirect();
  }

  /**
   * Obtain the user information from GitHub.
   *
   * @return \Illuminate\Http\Response
   */
  public function handleProviderCallback()
  {
      $auto_password = Str::random(9);

      $user = Socialite::driver('github')->user();

      User::insert([
        'name' => $user->getNickname(),
        'email' => $user->getEmail(),
        'password' => Hash::make($auto_password),
        'email_verified_at' => Carbon::now(),
        'role' => 2,
        'created_at' => Carbon::now()
      ]);
        Mail::to($user->getEmail())->send(new SentPassword($auto_password));
      return back()->with('status', 'Your Account Register successfully!');
      // $user->token;
  }
}
