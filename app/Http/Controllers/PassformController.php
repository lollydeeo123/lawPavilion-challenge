<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use PDO;
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

           // $tables = DB::select('SHOW TABLES'); // returns an array of stdObjects

           //$dbh = Schema::getColumnListing($tables);

          //$dblist = new PDO('mysql:host=localhost;user=dbuser;password=Db@12345;');
          //  $statement = $dblist->query('SHOW DATABASES');
           //$columns= $statement->fetchAll(PDO::FETCH_COLUMN);

            $mydbase = $request->mydbname;
            //$pdo = new PDO("mysql:host=$host;port=$port", $user, $password);

//Execute a "SHOW DATABASES" SQL query.
           // $stmt = $pdo->query('SHOW DATABASES');

//Fetch the columns from the returned PDOStatement
            //$databases = $stmt->fetchAll(PDO::FETCH_COLUMN);


        }
        return view('passform',compact('mydbase'));
    }



}
