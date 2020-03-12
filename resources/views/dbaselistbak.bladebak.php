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
                    resources/views/dumpfiles.blade.php:24


                        <form class="form-horizontal" id="form" role="form" method="POST" action="/dbaselist">
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
                                            <?php  $i=0;
                                            $all="";?>

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
                                                    <td colspan="5" >


                                                            <input type="button" onclick='selectAll();' value="Select All"/>
                                                            <input type="button" onclick='UnSelectAll();mytables.value="";' value="Unselect All"/>
                                                             <input type="submit"  value="Dump"/>
                                                       {{-- <div class="form-group">
                                                            {!! Form::submit('Dump Selected',['class' => 'btn btn-primary form-control']) !!}
                                                        </div>
                                                        <div class="form-group">
                                                            {!! Form::button('Dump Database All',['class' => 'btn btn-info form-control','onClick'=>'checkAll()']) !!}
                                                        </div>


                                                        <div class="form-group">
                                                            {!! Form::button('Clear All',['class' => 'btn btn-danger form-control','onClick'=>'select_all("agree", "0")']) !!}
                                                        </div>--}}
                                                        <input type="text" id ="allmytable" name="allmytables" readonly="readonly" value="<?php echo $all;?>" >
                                                        <input type="text" id ="mytable" name="mytables" readonly="readonly" value="" >
                                                    </td>
                                                </tr>
<tr><td><div class="form-group row">
            <label for="hostname" class="col-md-4 col-form-label text-md-right">{{ 'Select Where to dump database/tables' }}</label>

            <div class="col-md-6">
                <select id="hostname" type="hostname" class="form-control @error('hostname') is-invalid @enderror" name="hostname" required autocomplete="current-password">
                    <option>Local Drive</option>
                    <option>Google Drive</option>
                    <option value="Localhost"  selected="selected" >Localhost </option>

                </select>
        @error('hostname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div></td></tr>
                                        </table>

                        </form>







                </div>
            </div>
        </div>
    </div>
</div>
@endsection
