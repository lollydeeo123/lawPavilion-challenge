@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Database Dump </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif




                        <div class="panel-group" id="accordion1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne">
                                            Click for List of Databases
                                        </a></h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse">
                                    <div class="panel-body">

                                        <table class="table-bordered" width="80%">

                                            <tr>
                                                <td colspan="6">

                                                    <div>
                                                        <h4>List of Databases </h4>
                                                    </div>
                                                </td>
                                            </tr>




                                            <tr >
                                                <td>#</td>
                                                <td>Database Name</td>
                                                <td>Tables</td>
                                                <td>Units</td>
                                                <td>Comment</td>
                                                <td></td>
                                            </tr>
                                            <?php $i = 1; ?>
                                            @foreach($columns as $column)
                                               {{--// @if($progcourse->remark=='C' || $progcourse->remark=='R')--}}



                                                    <tr>

                                                        <td>
                                                            {{$i++}}

                                                        </td>
                                                        <td>
                                                            {{$column}}
                                                        </td>
                                                        <td>

                                                            @foreach($tables as $table)
                                                              <?php //$tbl= "Tables_in_".$column;
                                                               // $table= json_decode( json_encode($table), true);?>
                                                           <ul><li>{{$table->Tables_in_databasedump}}</li></ul>

                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            {{--{!! $progcourse->unit !!}--}}
                                                        </td>
                                                        <td>
                                                            {{--{!! $progcourse->remark !!}--}}
                                                        </td>
                                                        <td>
                                                            <div class="checkbox">
                                                                <label>

                                                                    <input type="checkbox" id="cr" name="{!!$table->Tables_in_databasedump !!}" value={!! $table->Tables_in_databasedump !!}
                                                                    checked="checked"
                                             {{--/>/                              @endif--}}
                                                                          >

                                                                </label>

                                                            </div>
                                                        </td>


                                                    </tr>
                                                {{--//@endif--}}
                                            @endforeach

                                                <tr>
                                                    <td colspan="5" >
                                                        <button type="submit" class="btn btn-primary">
                                                            Dump
                                                        </button>
                                                    </td>
                                                </tr>

                                        </table>

                                    </div>
                                </div>
                            </div>

                        </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
