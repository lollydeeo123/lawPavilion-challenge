<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Dumplog;

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




            $filename = 'backups' . date('Y-m-d') . '.sql';
            $allmytables = substr($allmytables1, 1);
            $allmytable=explode(',',$allmytables1);
            $path_to_dump = env("PATH_TO_DUMP", "Path not set");
            $db_port=env("DB_PORT","3306");
            $cloud_ip=env("CLOUD_IP","34.67.182.226");
            $cloud_bucket=env("CLOUD_BUCKET","Buckets/store_of_stuff");
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
                $command = $path_to_dump.' --opt -h '.$host.' -u '.$username.' -p'.$password.' '.$dbs.' > '.$filename.' 2>&1';
                }else {
                    $command = $path_to_dump.' --opt -h '.$cloud_ip.' -P '.$db_port.' -u ' . $username . ' -p' . $password . ' ' . $dbs . '--hex-blob --skip-triggers --master-data=1 --order-by-primary --compact --no-autocommit  default-character-set=utf8  --single-transaction --set-gtid-purged=on | gzip |gsutil cp - gs: > '.$cloud_bucket.' 2>&1';
                    //echo $dumpsite;
                     }
            }else{//tables were selected..not a full dump
                $alltables= $mytables;
                $type='Partial Dump';//$command='ff';
                if( $dumpsite=='Local Drive'){
                    //echo $dumpsite;
                    $command = $path_to_dump.' --opt -h '.$host.' -u '.$username.' -p'.$password.' '.$dbs.' '.$mytablestr.' > '.$filename.' 2>&1';
                }else {
                    $command = $path_to_dump.' --opt -h '.$cloud_ip.' -P '.$db_port.' -u ' . $username . ' -p' . $password . ' ' . $dbs .''.$mytablestr. '--hex-blob --skip-triggers --master-data=1 --order-by-primary --compact --no-autocommit  default-character-set=utf8  --single-transaction --set-gtid-purged=on | gzip |gsutil cp - gs: > '.$cloud_bucket.' 2>&1';
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
