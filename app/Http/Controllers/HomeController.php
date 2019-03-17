<?php

namespace App\Http\Controllers;
use App\Attendance;
use Illuminate\Http\Request;

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
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendances = Attendance::select('date')->distinct()->get();
      
        
        return view('home', ['attendances'=>$attendances]);
    }
}
