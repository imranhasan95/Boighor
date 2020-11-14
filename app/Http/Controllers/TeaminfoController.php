<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use Image;
use Carbon\Carbon;

class TeaminfoController extends Controller
{
  public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('checkrole');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teamlists = Team::all();
        return view('teamin.index',[
          'teamlists' => $teamlists,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $inser_Id = Team::insertGetId([
        'team_name' => $request->team_name,
        'teamcategory_name' => $request->teamcategory_name,
        'created_at' => Carbon::now(),
      ]);
      if ($request->hasFile('team_images')) {
          $team_photo = $request->file('team_images');
          $filename = $inser_Id . '.' . $team_photo->getClientOriginalExtension();
          Image::make($team_photo)->resize(300, 375)->save( base_path('public/uploads/team_photo/' . $filename ),40 );
          team::findOrFail($inser_Id)->update([
              'team_images' => $filename,
          ]);
      }

      return back()->with('status', 'Team insert  successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
