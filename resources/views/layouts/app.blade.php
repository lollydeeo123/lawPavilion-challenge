<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LawPavillion Challenge </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img  src="{{'/images/official-logo.png'}}"><br>  Coding Challenge {{--{{ config('app.name', 'Database Dump') }}--}}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
            <script language="JavaScript" type="text/JavaScript">

                function selectAll(){

                    var items=document.getElementsByName('tablename');
                    for(var i=0; i<items.length; i++){
                        if(items[i].type=='checkbox')

                            items[i].checked=true;

                    }

                }






                function UnSelectAll(){
                    var items=document.getElementsByName('tablename');

                    for(var i=0; i<items.length; i++){
                        if(items[i].type=='checkbox')
                            items[i].checked=false;

                    }
                }




                    /*function togglecheckboxes(master,group){
                     var tbarray = document.getElementsByClassName(group);
                     for(var i = 0; i < tbarray.length; i++){
                     var tablename = document.getElementById(tbarray[i].id);
                     tablename.checked = master.checked;
                     }
                     }*/


                    function fillhd(whichbox) {
                        with (whichbox.form) {

                            if (whichbox.checked == false) {

                                var str = mytables.value;
                                var needle=","+ whichbox.value;
                                var res = str.replace(needle, "");

                                mytables.value = res;

                            } else {

                                mytables.value = mytables.value + "," + whichbox.value;

                            }
                            // mycourses.value = tempcourse.value
                            return (mytables.value);
                        }


                    }




            </script>
        </main>
    </div>
</body>
</html>
