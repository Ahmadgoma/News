<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>News Admin panel</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
 <style type="text/css">
        .page-title { font-size: 18px; height: 40px; line-height: 40px; border-bottom: 1px solid #ccc  }
        .page-title-list { height: 60px; line-height: 40px }

    </style>
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
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                         @if (Auth::check())
                            <li><a href="{{ url('/profile') }}">Profile</a></li>
                           @if(Auth::user()->role == 1)
                              <li><a href="{{ url('/control') }}">Control</a></li>
                              <!-- Searching  section -->
                      <li>
                            <form action="/search" method="post" class="form-group">
                                {{csrf_field()}}
                                <input type="search" name="search" style="margin-top: 10px;" placeholder="Search with title" class="glyphicon glyphicon-search">
                                <input type="submit" value="Search" class="glyphicon glyphicon-search">
                            </form>

                            </form>&nbsp;&nbsp;</li>
                           <li> <form action="/searchDate" method="post" class="form-group">
                                {{csrf_field()}}
                               
                                <input type="date" name="searchFrom" placeholder="Search From" style="margin-top: 10px;" class="glyphicon glyphicon-search">
                                <input type="date" name="searchTo" placeholder="Search To" style="margin-top: 10px;" class="glyphicon glyphicon-search">
                                <input type="submit" value="Serach by date"  class="glyphicon glyphicon-search">
                            </form>
                            </li>
                            <!-- Searching section End -->
                           @endif
                        @endif
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
                                    {{ Auth::user()->name }} <span class="caret"></span>
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
       <div class="container">
        @yield('content')
        </div>
    </div>

    <!-- Scripts style="width:600px; padding: 25px 0 0 0; -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
