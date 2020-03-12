@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dump files Complete  {{$dbs}} </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif






                        <form class="form-horizontal" id="form" role="form" method="POST" action="/dumpfiles">
                            {!! csrf_field() !!}
                            <br>


                                        <table class="table-bordered" width="80%">

                                            <tr >
                                                <td>#</td>

                                                <td>Username</td>
                                                <td>Type</td>
                                                <td>Database</td>
                                                <td>Tables</td>
                                                <td>Time of Dump</td>
                                                <td>Disk</td>

                                            </tr>
                                            <?php  $i=1;
                                            $all="";?>

                                            @foreach($schema as $table)


                <tr>

                    <td>
                        {{$i++}}

                    </td>

                    <td>
                        {{$table->username}}
                    </td>
                    <td>
                        {{$table->type}}
                    </td>
                    <td>
                        {{$table->database}}
                    </td>
                    <td>{{$table->mytables}}</td>
                    <td>{{$table->created_at}}</td>
                    <td>{{$table->dumpsite}}</td>

                </tr>

                                          @endforeach







                                        </table>

                        </form>







                </div>
            </div>
        </div>
    </div>
</div>
@endsection
