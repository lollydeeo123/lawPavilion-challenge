@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">List of Tables in  {{$dbs}} </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif









                                        <table class="table-bordered" width="80%">

                                            <tr >
                                                <td>#</td>

                                                <td>Tables</td>
                                                <td>Collation</td>
                                                <td>Size</td>
                                                <td>Number of Rows</td>
                                                <td>Engine</td>
                                                <td>Last Updated</td>
                                            </tr>
                                            <?php $i = 1; ?>

                                               {{--// @if($progcourse->remark=='C' || $progcourse->remark=='R')--}}



                                               @foreach($tables as $table)


                <tr>

                                                        <td>
                                                            {{$i++}}

                                                        </td>

                                                        <td>





                                                               {{$table}}
                                                        </td>
                    @foreach($schema as $schemas)

                        @if($schemas->table_name==$table)
                        <td>{{$schemas->table_collation}}</td>
                        <td>{{ROUND($schemas->DATA_LENGTH +$schemas->INDEX_LENGTH)/1024}}</td>
                        <td>{{$schemas->table_rows}}</td>
                        <td>{{$schemas->engine}}</td>
                        <td>{{$schemas->update_time}}</td>

                                                           <td><div class="checkbox">
                                                                   <label>

                                                                       <input type="checkbox" id="cr" name="{!!$table !!}" value={!! $table !!}
                                                                               checked="checked"
                                                                               {{--/>/                              @endif--}}
                                                                       >

                                                                   </label>

                                                               </div>
                                                           </td>

                                                           </tr>
                                                @endif @endforeach    @endforeach


                                                {{--//@endif--}}


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
@endsection
