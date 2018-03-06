<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
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
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .top-left {
                position: absolute;
                left: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            body {
                background-image: url("/images/gathering.jpg");
                background-color: #cccccc;
                background-position: center;
            }
            .search-form .form-group {
                float: right !important;
                transition: all 0.35s, border-radius 0s;
                width: 32px;
                height: 32px;
                background-color: #fff;
                box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
                border-radius: 25px;
                border: 1px solid #ccc;
            }
            .search-form .form-group input.form-control {
                padding-right: 20px;
                border: 0 none;
                background: transparent;
                box-shadow: none;
                display:block;
            }
            .search-form .form-group input.form-control::-webkit-input-placeholder {
                display: none;
            }
            .search-form .form-group input.form-control:-moz-placeholder {
                /* Firefox 18- */
                display: none;
            }
            .search-form .form-group input.form-control::-moz-placeholder {
                /* Firefox 19+ */
                display: none;
            }
            .search-form .form-group input.form-control:-ms-input-placeholder {
                display: none;
            }
            .search-form .form-group:hover,
            .search-form .form-group.hover {
                width: 100%;
                border-radius: 4px 25px 25px 4px;
            }
            .search-form .form-group span.form-control-feedback {
                position: absolute;
                top: -1px;
                right: -2px;
                z-index: 2;
                display: block;
                width: 34px;
                height: 34px;
                line-height: 34px;
                text-align: center;
                color: #3596e0;
                left: initial;
                font-size: 14px;
            }


        </style>
    </head>
    <body>
        <h1 style="position:absolute; right: 460px; top:70px;color: green">
        Your education Your way
        </h1>
        <h1 style="position:absolute; right: 420px; top:120px">
            BIG DREAMS COME TRUE HERE
        </h1>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-left links">
                    <a class="navbar-brand" href="{{ url('/') }}" style="background-color: #002a80; font-style: italic; color: whitesmoke; font-size: 20pt; padding-right: 0px">
                        {{ config('app.name', 'Laravel Multi Auth Guard') }}
                    </a>
                    <a class="navbar-brand" href="{{ url('/') }}" style="background-color: orangered; font-style: normal; color: black; font-size: 20pt; padding-left: 0px; mso-cellspacing: 5px">
                        .lk
                    </a>
                </div>
                <div class="top-right links">
                    @if (!Auth::guard('student')->user() and !Auth::guard('teacher')->user())
                        <li><a href="{{ url('/student/login') }}">Login  <i class="fa fa-address-book" ></i></a></li>
                        <li><a href="{{ url('/student/register') }}">Register   <i class="fas fa-accusoft " ></i></a></li>
                    @elseif(Auth::guard('student')->user())
                        <li><a href="{{ url('/student/notifications') }}">Notifications   <i class="fas fa-bell  " ></i></a></li>
                        <li><a href="{{ url('/') }}">Search   <i class="fas fa-neuter   " ></i></a></li>
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
                                    <a href="{{ url('/student/profile') }}">
                                        Edit Profile
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @else
                            <li class="dropdown">
                            <li><a href="{{ url('/teacher/tuition') }}">Create Tuition   <i class="fas fa-newspaper  " ></i></a></li>
                            <li><a href="{{ url('/teacher/requests') }}">Requests  <i class="fas fa-bell  " ></i></a></li>
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
                    <li><a href="{{ url('/about') }}">About Us   <i class="fas fa-blackberry" ></i></a></li>

                </div>
            @endif

            <div class="content">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('student/search') }}">
                    {{ csrf_field() }}

                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="submit" class="btn btn-secondary" name="submitbutton" value="subject">Subject</button>
                        <button type="submit" class="btn btn-secondary" name="submitbutton" value="teacher">Teacher Name</button>
                        <button type="submit" class="btn btn-secondary" name="submitbutton" value="place">Area</button>
                    </div>
                    <div class="form-group{{ $errors->has('search') ? ' has-error' : '' }}">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4 col-md-offset-3">
                                    <form action="" class="search-form">
                                        <div class="form-group has-feedback">
                                            <label for="search" class="sr-only">Search teachers</label>
                                            <input type="text" class="form-control" name="search" id="search" placeholder="search">
                                            <span class="fa fa-neuter  form-control-feedback"></span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @if ($errors->has('search'))
                            <span class="help-block" style="color:red; font-style:oblique;">
                                        <strong>{{ $errors->first('search') }}</strong>
                            </span>
                        @endif
                    </div>
                </form>
                <div class="row">
                    <div class="title m-b-md">
                        Tuition.lk
                    </div>
                </div>
            </div>

        </div>
    </body>
</html>
