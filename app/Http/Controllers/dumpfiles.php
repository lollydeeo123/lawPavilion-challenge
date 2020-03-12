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

    }
    public function show(Request $request){


        $user =  User::where('name','=',Auth::user()->name)->first();
        if (Auth::user()){

            $dbs = $request->dbs;
//get info for dump logs
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




            $filename = 'backups' . date('Y-m-d') . '.sql';
            $allmytables = substr($allmytables1, 1);
            $allmytable=explode(',',$allmytables1);

            $mytables = substr($mytables1, 1);
            $mytable=explode(',',$mytables);
            $mytablestr=str_replace(","," ",$mytables);
//determine if its a full dump or partial dump
            if( $mytables1==""){
                $alltables= $allmytables;

                $type='Full Dump';
                //local drive or google drive?
                if( $dumpsite=='Local Drive'){
                    //echo $dumpsite;
                $command = 'C:\xampp\mysql\bin\mysqldump --opt -h '.$host.' -u '.$username.' -p'.$password.' '.$dbs.' > '.$filename.' 2>&1';
                }else {
                    $command = 'C:\xampp\mysql\bin\mysqldump --opt -h 34.67.182.226 -P 3306 -u ' . $username . ' -p' . $password . ' ' . $dbs . '--hex-blob --skip-triggers --master-data=1 --order-by-primary --compact --no-autocommit  default-character-set=utf8  --single-transaction --set-gtid-purged=on | gzip |gsutil cp - gs: > Buckets/store_of_stuff 2>&1';
                    //echo $dumpsite;
                     }
            }else{//tables were selected..not a full dump
                $alltables= $mytables;
                $type='Partial Dump';//$command='ff';
                if( $dumpsite=='Local Drive'){
                    //echo $dumpsite;
                    $command = 'C:\xampp\mysql\bin\mysqldump --opt -h '.$host.' -u '.$username.' -p'.$password.' '.$dbs.' '.$mytablestr.' > '.$filename.' 2>&1';
                }else {
                    $command = 'C:\xampp\mysql\bin\mysqldump --opt -h 34.67.182.226 -P 3306 -u ' . $username . ' -p' . $password . ' ' . $dbs .''.$mytablestr. '--hex-blob --skip-triggers --master-data=1 --order-by-primary --compact --no-autocommit  default-character-set=utf8  --single-transaction --set-gtid-purged=on | gzip |gsutil cp - gs: > Buckets/store_of_stuff 2>&1';
                    //echo $dumpsite;
                }

            }
           exec($command);
           // echo "ret_arr: <br />";
         // print_r($command);
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
