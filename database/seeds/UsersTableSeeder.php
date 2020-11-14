<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
      'name' => 'Admin',
      'email' => 'Admin@gmail.com',
      'password' => Hash::make('123456789'),
      'email_verified_at' => Carbon::now(),
       'role' => 1,
       'created_at' => Carbon::now(),
  ]);
    }
}
