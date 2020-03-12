@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>Enter Database Credentials for {{$mydbase}}</h4></div>

                <div class="card-body">
                    <form method="POST" action="/dbaselist">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>
                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="hostname" class="col-md-4 col-form-label text-md-right">{{ 'Hostname' }}</label>

                            <div class="col-md-6">
                                <select id="hostname" type="hostname" class="form-control @error('hostname') is-invalid @enderror" name="hostname" required autocomplete="current-password">
                                    <option>Select Host</option>
                                    <option value="Localhost"  selected="selected" >Localhost </option>
                                    <option value="127.0.0.1"   >127.0.0.1 </option>
                                    <option value="%"   >% </option>
                                    <option value="::1"   >::1 </option>
                                </select>
                                @error('hostname')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <input type="hidden" name="mydbase" value="{!! $mydbase !!}">

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Submit
                                </button>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
