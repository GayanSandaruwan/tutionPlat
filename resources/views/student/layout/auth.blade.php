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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    {{--<script type="text/javascript"--}}
            {{--src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">--}}
    {{--</script>--}}
    <script type="text/javascript" src="/bootstrap-datepicker-1.6.4-dist/css/bootstrap-datepicker.min.css"></script>
    <script type="text/javascript" src="/bootstrap-datepicker-1.6.4-dist/js/bootstrap-datepicker.min.js"></script>
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
                <a class="navbar-brand">Student</a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (!Auth::guard('student')->user())
                        <li><a href="{{ url('/student/login') }}" style="background-color: #91cbe8">Login  <i class="fa fa-address-book" ></i></a></li>
                        <li><a href="{{ url('/student/register') }}"style="background-color: #ffdb99">Register   <i class="fas fa-accusoft " ></i></a></li>
                    @else
                        <li><a href="{{ url('/student/tuition/my') }}"style="background-color: #ffdb99">Notifications   <i class="fas fa-bell  " ></i></a></li>
                        <li><a href="{{ url('/') }}"style="background-color: #fde19a">Search   <i class="fas fa-neuter   " ></i></a></li>
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::guard('student')->user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/student/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/student/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                                <li>
                                    <a href="{{ url('/student/profile/view') }}">
                                        Edit Profile
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

 </body>

<footer>
    @include('student.layout.footer')
</footer>
</html>
