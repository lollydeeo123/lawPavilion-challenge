<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use mysqli;

class database extends Controller
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

    }

    public function store(Request $request)
    {
        if (Auth::user()){

            //get all sent variables
            $username = $request->username;
            $password = $request->password;
            // $database = $request->dbname;
            $host = $request->hostname;
            $mysqli = new mysqli($host, $username, $password);
            //connect to database and exit if not valid
            //select all tables from the database
            $columns = array();
            $result = $mysqli->query("SHOW DATABASES");
            if($result === FALSE) {
                ('error o'.$mysqli->error); // or $mysqli->error_list
            }
            else {

                while ($row = mysqli_fetch_row($result)) {
                    $columns[] = $row[0];
                }

            }


        }
        return view('database',compact('columns','username','password','host'));
    }

}
