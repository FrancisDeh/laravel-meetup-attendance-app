<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('pnotify/dist/pnotify.css') }}" rel="stylesheet">
    <link href="{{ asset('pnotify/dist/pnotify.buttons.css') }}" rel="stylesheet">
    <link href="{{ asset('pnotify/dist/pnotify.nonblock.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                            <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        @else
                            <li><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                            <li><a class="nav-link" href="{{ route('all_visitors') }}">All Visitors</a></li>
                            

                       
                        
                            <li class="nav-item dropdown">

                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
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
            <!--Include Notifications here-->
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        @include('partials.notifications._errorinfo')
                        @include('partials.notifications._successinfo')
                    </div>
                </div>
            </div>

            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('pnotify/dist/pnotify.js') }}"></script>
    <script src="{{ asset('pnotify/dist/pnotify.buttons.js') }}"></script>
    <script src="{{ asset('pnotify/dist/pnotify.nonblock.js') }}"></script>\
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>

    <script>
       
        function checkAttendance(id) {
            $.post("{{ route('check_attendance')}}",
            {
                _token: '{{ csrf_token() }}',
                id: id
            },
            function(data, status){
                
                if(data.status == 'success') {
                    new PNotify({ title: 'Success',
                                  text: data.message,
                                  type: 'success',
                                  styling: 'bootstrap3',
                            });

                            setTimeout(function() {window.location.href = '{{ route('home') }}';}, 3000);
                        }   
                        else{
                            new PNotify({ title: 'Error',
                            text: data.message,
                            type: 'error',
                            styling: 'bootstrap3',
                        }); 
                        }
                    });
                }
        
                function getAllVisitors() {
                    window.location.href = '{{ route('all_visitors') }}';
                }

        $(document).ready(function(){

        /*
            The search button enables search by different parameters, on input
            ,the search term is sent to database to find match using jquery's autocomplete
        */		
        
            $('#searchTerm').autocomplete({
                
                source: 'search'
            });
        });



    </script>
</body>
</html>
