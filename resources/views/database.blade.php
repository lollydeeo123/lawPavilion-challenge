                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          @extends('layouts.app')

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

                                            </tr>
                                            <?php $i = 1; ?>
                                            @foreach($columns as $column)
                                                {{--// @if($progcourse->remark=='C' || $progcourse->remark=='R')--}}



                                                <tr>

                                                    <td>
                                                        {{$i++}}

                                                    </td>
                                                    <td>
                                                        <a href="{{ url('/passform') }}?mydbname={{$column}}"> {{$column}}</a>
                                                    </td>



                                                </tr>
                                                {{--//@endif--}}
                                            @endforeach



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
