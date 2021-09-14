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
    <link href="{{ asset('js/OwlCarousel2-2.2.1/dist/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('js/OwlCarousel2-2.2.1/dist/assets/owl.theme.default.min.css')}}" rel="stylesheet">
    <link href="{{ asset('js/jquery-ui/jquery-ui.css') }}" rel="stylesheet">
    <link href="{{ asset('js/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="{{asset('js/Trumbowyg/ui/trumbowyg.css')}}" rel="stylesheet">
    <link href="{{asset('js/datepicker/css/bootstrap-datepicker3.css')}}" rel="stylesheet">
    <link href="{{asset('js/datepicker/css/bootstrap-datepicker.standalone.css')}}" rel="stylesheet">
    <link href="{{asset('js/bootstrap-social-iconos/bootstrap-social.css')}}" rel="stylesheet">
    <link href="{{ asset('js/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">




</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/home') }}">
                      <b>Diseño Grafico</b>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                      Bienvenido   <b class="badge">{{ Auth::user()->name }}</b> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{asset('js/bootstrap-social-iconos/assets/js/jquery.js')}}"></script>
    <script src="{{asset('js/bootstrap-social-iconos/assets/js/docs.js')}}"></script>
    <script src="{{asset('js/OwlCarousel2-2.2.1/dist/owl.carousel.js')}}"></script>
    <script src="{{asset('js/OwlCarousel2-2.2.1/dist/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('js/Trumbowyg/trumbowyg.js') }}"></script>
    <script src="{{asset('js/datepicker/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('js/datepicker/locales/bootstrap-datepicker.es.min.js')}}"></script>



</body>
</html>
