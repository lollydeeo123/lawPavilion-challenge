<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use PDO;
use mysqli;
use App\User;
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

            //$tables = DB::select('SHOW TABLES'); // returns an array of stdObjects

           //$dbh = Schema::getColumnListing($tables);

          //$dblist = new PDO('mysql:host=localhost;user=dbuser;password=Db@12345;');
           // $statement = $dblist->query('SHOW DATABASES');
          // $columns= $statement->fetchAll(PDO::FETCH_COLUMN);
            $username = $request->username;
            $password = $request->password;
            $database = $request->dbname;
            $host = $request->hostname;
            $mysqli = new mysqli("localhost", $username, $password, $database);
            //connect to database and exit if not valid

            $schema = DB::table('information_schema.TABLES')
                ->select('table_collation', 'table_collation','engine','data_length','index_length','update_time','create_time')
                ->where('table_schema', '=',$request->dbname )
                ->get();
            //$connection = mysqli_connect('localhost','dbuser','Db@12345','databasedump');
           //$result = $mysqli->query($schema);

            //$pdo = new PDO("mysql:host=$host;port=$port", $user, $password);

//Execute a "SHOW DATABASES" SQL query.
           // $stmt = $pdo->query('SHOW DATABASES');

//Fetch the columns from the returned PDOStatement
            //$databases = $stmt->fetchAll(PDO::FETCH_COLUMN);


        }
        return view('home',compact('tables','schema','username','password','host'));
    }
    public function add(){
    }

    public function store(Request $request)
    {
        $user =  User::where('name','=',Auth::user()->name)->first();
        if (Auth::user()){

            //$tables = DB::select('SHOW TABLES'); // returns an array of stdObjects

            //$dbh = Schema::getColumnListing($tables);

            //$dblist = new PDO('mysql:host=localhost;user=dbuser;password=Db@12345;');
            // $statement = $dblist->query('SHOW DATABASES');
            // $columns= $statement->fetchAll(PDO::FETCH_COLUMN);
            $username = $request->username;
            $password = $request->password;
            $dbs = $request->mydbase;
            $host = $request->hostname;
            $mysqli = new mysqli("localhost", $username, $password, $dbs);
            //connect to database and exit if not valid

            $schema = DB::table('information_schema.TABLES')
                ->select('table_schema','table_collation','table_name', 'table_rows','engine','data_length','index_length','update_time','create_time')
                ->where('table_schema', '=',$request->mydbase )
                ->get();
            //$connection = mysqli_connect('localhost','dbuser','Db@12345','databasedump'); DB::table ('programme_courses', 'programme_courses.progid', '=', $student->progid)
            //$result = $mysqli->query($schema);,'tables.table_schema', '=',$request->mydbase
            //$connection = mysqli_connect('localhost',$username, $password, $dbs);
            $tables = array();
            $result = $mysqli->query("SHOW TABLES");

            if($result === FALSE) {
               ('error o'.$mysqli->error); // or $mysqli->error_list
            }
            else {
                // as of php 5.4 mysqli_result implements Traversable, so you can use it with foreach
                //foreach( $result as $row ) {
                while ($row = mysqli_fetch_row($result)) {
                    $tables[] = $row[0];
                }
                //$pdo = new PDO("mysql:host=$host;port=$port", $user, $password);
            }
//Execute a "SHOW DATABASES" SQL query.
            // $stmt = $pdo->query('SHOW DATABASES');

//Fetch the columns from the returned PDOStatement
            //$databases = $stmt->fetchAll(PDO::FETCH_COLUMN);'tables'


        }
        return view('dbaselist',compact('schema','dbs','tables','username','password','host'));
        //return print_r($schema);
    }
}
