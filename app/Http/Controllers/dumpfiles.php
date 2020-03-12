<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use PDO;
use mysqli;
use App\User;
use App\Dumplog;
use MySQLDump;
use Storage;

class dumpfiles extends Controller
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
        //if (Auth::user()){

            //$tables = DB::select('SHOW TABLES'); // returns an array of stdObjects

           //$dbh = Schema::getColumnListing($tables);


           // $statement = $dblist->query('SHOW DATABASES');
          // $columns= $statement->fetchAll(PDO::FETCH_COLUMN);
           /* $username = $request->username;
            $password = $request->password;
            $database = $request->dbname;
            $host = $request->hostname;
            $dbs =  $request->dbs;
            $allmytable =  $request->allmytable;
            $mytable =  $request->mytable;

            $mysqli = new mysqli("localhost", $username, $password, $database);
            //connect to database and exit if not valid
$msg="dump complete";
            $schema = DB::table('information_schema.TABLES')
                ->select('table_collation', 'table_collation','engine','data_length','index_length','update_time','create_time')
                ->where('table_schema', '=',$request->dbname )
                ->get();
            //$connection = mysqli_connect('localhost','dbuser','Db@12345','databasedump');
           //$result = $mysqli->query($schema);
            exec('mysqldump --user=$username --password=$password --host=$host $dbs > /c:/downloads/file.sql');
            //$pdo = new PDO("mysql:host=$host;port=$port", $user, $password);

//Execute a "SHOW DATABASES" SQL query.
           // $stmt = $pdo->query('SHOW DATABASES');

//Fetch the columns from the returned PDOStatement
            //$databases = $stmt->fetchAll(PDO::FETCH_COLUMN);


        }
        return view('dumpfiles',compact('msg','allmytable','mytable','dbs'));*/
    }
    public function show(Request $request){


        $user =  User::where('name','=',Auth::user()->name)->first();
        if (Auth::user()){

            $dbs = $request->dbs;

            $schema = DB::table('dumplogs')
                ->select('username','dumpsite','database', 'mytables','created_at','type')
                ->where('database', '=',$request->dbs )
                ->orderBy('created_at','DESC')
                ->distinct()
                ->get();
        }
        // print_r($dbs);
        return view('dumpfiles',compact('dbs','schema'));
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
            $dbs = $request->dbs;
            $host = $request->hostname;
            $dumpsite = $request->dumpsite;
            $alltables="";
            $type='';
            $allmytables1 =  $request->allmytables;
            $mytables1 =  $request->mytables;

            /*$db = new mysqli($host, $username, $password, $dbs);
            $dump = new MySQLDump($db);

           $dump->save('dump' . date('Y-m-d H-i') . '.sql');*/
          //exec('mysqldump -user=$username -password=$password -host=$host $dbs > /c:/backups/file.sql');
//"\"C:\\Program Files\\MySQL\\MySQL Server 4.1\\bin\\mysqldump.exe\" --opt --skip-extended-insert --complete-insert -h ".$DB_HOST." -u ".$DB_USER." -p ".$DB_PASS." ".$DB_NAME." > backup.sql";

            // $command = "\"C:\\xampp\\mysql\\bin\\mysqldump.exe\" --opt --skip-extended-insert --complete-insert -h ".$host." -user ".$username." -password".$password." ".$dbs." > backup.sql";;


            /*$backupFile = "backup" . date("Y_m_d") . '.sql';
            $command = "mysqldump --opt -h $host -u $username -p $password $dbs > $backupFile";
            system($command , $return);

            echo "Returned: ".$return;*/

            /*  $cmd =
                  "mysqldump -h " . $host .
                  " -u "          . $username .
                  " -p"         . $password .
                  " " . $dbs;

              echo "Returned: ".$cmd;
              $output = [];
              $name = 'dbasedumps' . date('Y-m-d H-i') . '.sql';

              exec($cmd, $output);

              $tmppath = tempnam(sys_get_temp_dir(), $name);
              $handle = fopen($tmppath, "w");
              fwrite($handle, implode(n", $output));

            /*  Storage::disk('myS3bucket')
                  ->putFileAs("backups", new File($tmppath), $name);
            Storage::disk('local')->put('file.txt', 'Contents');

              Storage::disk('local')
                  ->put($name, $output);
              fclose($handle);*/
          //  $command = 'C:\xampp\mysql\bin\mysqldump --opt -h '.$host.' -u '.$username.' -p'.$password.' '.$dbs.' > test2.sql 2>&1';

            $filename = 'backups' . date('Y-m-d') . '.sql';
            $allmytables = substr($allmytables1, 1);
            $allmytable=explode(',',$allmytables1);

            $mytables = substr($mytables1, 1);
            $mytable=explode(',',$mytables);
            $mytablestr=str_replace(","," ",$mytables);

            if( $mytables1==""){
                $alltables= $allmytables;

                $type='Full Dump';
                if( $dumpsite=='Local Drive'){
                    echo $dumpsite;
                $command = 'C:\xampp\mysql\bin\mysqldump --opt -h '.$host.' -u '.$username.' -p'.$password.' '.$dbs.' > '.$filename.' 2>&1';
                }else {
                    $command = 'C:\xampp\mysql\bin\mysqldump --opt -h 34.67.182.226 -P 3306 -u ' . $username . ' -p' . $password . ' ' . $dbs . '--hex-blob --skip-triggers --master-data=1 --order-by-primary --compact --no-autocommit  default-character-set=utf8  --single-transaction --set-gtid-purged=on | gzip |gsutil cp - gs: > Buckets/store_of_stuff 2>&1';
                    echo $dumpsite;   }
            }else{
                $alltables= $mytables;
                $type='Partial Dump';//$command='ff';
                $command = 'C:\xampp\mysql\bin\mysqldump --opt -h '.$host.' -u '.$username.' -p'.$password.' '.$dbs.' '.$mytablestr.' > '.$filename.' 2>&1';
            }
           exec($command);
           // echo "ret_arr: <br />";
          print_r($command);
            //print_r($filename);
           //Insert record in new dumplog table
         $dumplog = new Dumplog;

            $dumplog->mytables = $alltables;
            $dumplog->username = $request->input('username');
            $dumplog->database = $request->input('dbs');
            $dumplog->dumpsite = $request->input('dumpsite');
            $dumplog->type = $type;
            $dumplog->save();

            //connect to database and exit if not valid

            $schema = DB::table('dumplogs')
                ->select('username','dumpsite','database', 'mytables','created_at','type')
                ->where('database', '=',$request->dbs )
                ->orderBy('created_at','DESC')
                ->distinct()
                ->get();





        }
        return view('dumpfiles',compact('dbs','schema'));
        // return print_r($mytable);
    }
}
