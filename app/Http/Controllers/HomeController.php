<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courier\Courier;
use App\Models\Courier\CourierAction;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('staff',['except'=>['track']]);
       // $this->middleware(['auth','staff'],['except'=>['track','courier_status']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getCourierstatus(Request $request){
        try {
           
            $courier_status = Courier::getCourierbytracking($request->tracking_no);
            
          // dd($courier_status);
            return view('courier_status',compact('courier_status'));
            
          } catch (\Exception $e) {
           //  dd($e);
            return redirect()->back()->with('error', 'error:' . $e->getMessage());
          }

    }
}
