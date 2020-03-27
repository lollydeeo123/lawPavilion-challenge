<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PassformController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if (Auth::user()){



            $mydbase = $request->mydbname;



        }
        return view('passform',compact('mydbase'));
    }



}
