<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use app\Charts\bikroychart;
use App\Charts\BiroyChart;
use App\User;
use App\Sale;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('checkrole');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::id();
        $users = User::where('id','!=', $id)->get();
        // charts start
        $cp = Sale::where('payment_method', 1)->count();
        $cod = Sale::where('payment_method', 2)->count();

        $chart = new BiroyChart;
        $chart->labels(['Card Payment', 'Cash On Delivery (COD)']);
        $chart->dataset('Bikoy Stat', 'bar', [$cp, $cod])->options([
          'backgroundColor' => ['#ff0000', '#FEAA50'],
          ]);
          // charts end
        return view('home', [
          'users' => $users,
          'chart' => $chart,
        ]);
    }
}
