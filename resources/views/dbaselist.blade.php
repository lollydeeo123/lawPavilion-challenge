@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">List of Tables in  {{$dbs}} <br> (The database dumps are stored in the public folder)</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif



{{--///////////////////////example code

                        {!! Form::open(array('action' => 'ClientsController@display','method' => 'GET','name'=>'f1' , 'id'=>'form_id'))!!}
                        <br/>
                        @foreach($clients as $client)
                            <div class="form-group">
                                {!! Form::checkbox("agree[]", $client->email, null,['id' => $client->email], ['class' => 'questionCheckBox']), $client->email !!}
                                <br/>
                            </div>
                        @endforeach
                        <div class="form-group">
                            {!! Form::submit('Send Mail',['class' => 'btn btn-primary form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::button('Select All',['class' => 'btn btn-info form-control','onClick'=>'select_all("agree", "1")']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::button('Clear All',['class' => 'btn btn-danger form-control','onClick'=>'select_all("agree", "0")']) !!}
                        </div>

                        {!! Form::close() !!}


///////////////////////////////////////////// --}}


                        <form class="form-horizontal" id="form" role="form" method="POST" action="/dumpfiles">
                            {!! csrf_field() !!}
                            <br>


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
                                            <?php  $i=1;
                                            $all="";?>


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
                        <td>{{ROUND($schemas->data_length +$schemas->index_length)/1024}}</td>
                        <td>{{$schemas->table_rows}}</td>
                        <td>{{$schemas->engine}}</td>
                        <td>{{$schemas->update_time}}</td>

                                                           <td>

                                                                <?php $all=$all.",".$schemas->table_name; ?>
                                                               <div class="checkbox">
                                                                   <label>

                                                                      <input type="checkbox" id ="mytable" name="tablename" value={!!$table !!}

                                                                              onClick="this.form.mytables.value=fillhd(this);">
                                                                   </label>

                                                               </div>

                                                           </td>

                                                           </tr>
                                                @endif @endforeach    @endforeach


                                                {{--//@endif--}}

                                            <tr>
                                                <td colspan="8" ><div class="form-group row">
                                                        <label for="disk" class="col-md-4 col-form-label text-md-right">{{ 'Select Where to dump database/tables' }}</label>

                                                        <div class="col-md-6">
                                                            <select id="dumpsite" class="form-control @error('dumpsite') is-invalid @enderror" name="dumpsite" required autocomplete="current-password">


                                                                <option value="Local Drive"  selected="selected" >Local Drive </option>
                                                                <option  value="Google Drive">Google Drive</option>
                                                            </select>
                                                            @error('dumpsite')
                                                            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                                                            @enderror
                                                        </div>
                                                    </div></td></tr>
                                                <tr>
                                                    <td colspan="8" >


                                                            <input type="button" class="btn btn-primary" onclick='selectAll();' value="Select All"/>
                                                            <input type="button" class="btn btn-primary" onclick='UnSelectAll();mytables.value="";' value="Clear Selection"/>

                                                            <input type="submit" class="btn btn-primary" value="Dump files"/>

                                                        <a href="dumpfiles/show?dbs={{$dbs}}"dbs.value > <button type="button" class="btn btn-primary">
                                                                View Dump History
                                                            </button>

                                                        </a>
                                                        <input type="hidden"  name="allmytables" readonly="readonly" value="{{$all}}" >
                                                        <input type="hidden"  name="mytables" readonly="readonly" value="" >
                                                        <input type="hidden"  name="username" readonly="readonly" value="{{$username}}" >
                                                        <input type="hidden"  name="password" readonly="readonly" value="{{$password}}" >
                                                        <input type="hidden"  name="dbs" readonly="readonly" value="{{$dbs}}" >
                                                        <input type="hidden"  name="hostname" readonly="readonly" value="{{$host}}" >
                                                    </td>
                                                </tr>

                                        </table>

                        </form>







                </div>
            </div>
        </div>
    </div>
</div>
@endsection
