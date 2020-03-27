<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

use mysqli;

class dbaselist extends Controller
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

           //get all sent variables
            $user=Auth::user();
            $username = $request->username;
            $password = $request->password;

            $host = $request->hostname;

            //connect to database and exit if not valid
//select all tables from the database
            $schema = DB::table('information_schema.TABLES')
                ->select('table_collation', 'table_collation','engine','data_length','index_length','update_time','create_time')
                ->where('table_schema', '=',$request->dbname )
                ->get();


        }
        return view('home',compact('tables','schema','username','password','host','user'));
    }
    public function add(){
    }

    public function store(Request $request)
    {

        if (Auth::user()){

            $user=Auth::user();
            $username = $request->username;
            $password = $request->password;
            $dbs = $request->mydbase;
            $host = $request->hostname;
            $mysqli = new mysqli($host, $username, $password, $dbs);
            //connect to database and exit if not valid

            $schema = DB::table('information_schema.TABLES')
                ->select('table_schema','table_collation','table_name', 'table_rows','engine','data_length','index_length','update_time','create_time')
                ->where('table_schema', '=',$request->mydbase )
                ->get();
           //fetch all tables
            $tables = array();
            $result = $mysqli->query("SHOW TABLES");

            if($result === FALSE) {
               ('error o'.$mysqli->error); // or $mysqli->error_list
            }
            else {

                while ($row = mysqli_fetch_row($result)) {
                    $tables[] = $row[0];
                }

            }



        }
        return view('dbaselist',compact('schema','dbs','tables','username','password','host','user'));
        //return print_r($schema);
    }
}
