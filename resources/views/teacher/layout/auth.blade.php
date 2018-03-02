<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel Multi Auth Guard') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <style>
        body {
            background-image: url("/images/gathering.jpg");
            background-color: #cccccc;
        }
    </style>
</head>
<body>
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
                <a class="navbar-brand" href="{{ url('/') }}" style="background-color: #002a80; font-style: italic; color: whitesmoke; font-size: 20pt">
                    {{ config('app.name', 'Laravel Multi Auth Guard') }}
                </a>
                <a class="navbar-brand" href="{{ url('/') }}" style="background-color: orangered; font-style: normal; color: black; font-size: 20pt; padding-left: 0px; mso-cellspacing: 5px">
                    .lk
                </a>
                <a class="navbar-brand">Teacher</a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (!Auth::guard('teacher')->user())
                        <li><a href="{{ url('/teacher/login') }}" style="background-color: #91cbe8">Login  <i class="fa fa-address-book" ></i></a></li>
                        <li><a href="{{ url('/teacher/register') }}"style="background-color: #ffdb99">Register   <i class="fas fa-accusoft " ></i></a></li>
                    @else
                        <li class="dropdown">
                        <li><a href="{{ url('/teacher/tuition') }}"style="background-color: #ffdb99">Create Tuition   <i class="fas fa-newspaper  " ></i></a></li>
                        <li><a href="{{ url('/teacher/requests') }}"style="background-color: #faf2cc">Requests  <i class="fas fa-bell  " ></i></a></li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::guard('teacher')->user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/teacher/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/teacher/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                                <li>
                                    <a href="{{ url('/teacher/profile') }}">
                                        Edit Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/teacher/feedback') }}">
                                        View Feedback
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    <li><a href="{{ url('/about') }}"style="background-color: #f7ecb5">About Us   <i class="fas fa-blackberry" ></i></a></li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>

<footer>
    @include('teacher.layout.footer')
</footer>
</html>
