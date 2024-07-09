<!DOCTYPE HTML>
<html>

<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="{{ asset('user/css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('user/css/style.css') }}" rel='stylesheet' type='text/css' />
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href="{{ asset('user/css/font-awesome.css') }}" rel="stylesheet">
    <!-- Custom Theme files -->
    <script src="{{ asset('user/js/jquery-1.12.0.min.js') }}"></script>
    <script src="{{ asset('user/js/bootstrap.min.js') }}"></script>
    <!--animate-->
    <link href="{{ asset('user/css/animate.css') }}" rel="stylesheet" type="text/css" media="all">
    <script src="{{ asset('user/js/wow.min.js') }}"></script>
    <script src="{{ asset('user/js/jquery-ui.js') }}"></script>
    <style>
        .centered-div {
            display: flex;
            justify-content: center; /* Centers horizontally */
            align-items: center;    /* Centers vertically */
            min-height: 77vh;
        }
        .dropdown-menu {
            background-color: green;
            z-index: 9999 !important;
        }

        .cu {
            background-color: transparent;
            border: none;
        }

        .cu:hover {
            background-color: white;
        }
    </style>

    @yield('style')
    <script>
        new WOW().init();
    </script>


    <!--//end-animate-->
</head>

<body>


    <div class="header">
        <div class="container ">
            <div class="logo wow fadeInDown animated" data-wow-delay=".5s">
                <a href="{{ route('user.dashboard') }}">Tourism <span>Management System</span></a>
            </div>
        </div>
    </div>
    <!--- /header ---->
    <!--- footer-btm ---->
    <div class="footer-btm wow fadeInLeft animated" data-wow-delay=".5s">
        <div class="container">
            <div class="navigation">
                <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
                        <nav class="cl-effect-1 ">
                            <ul class="nav navbar-nav">
                                <li><a href="{{ route('user.dashboard') }}">Home</a></li>
                                <li><a href="{{ route('about') }}">About</a></li>
                                <li><a href="{{ route('enquiry') }}">Enquiry</a></li>
                                <li><a href="{{ route('contact') }}">Contact</a></li>
                                @if (!Auth::check())
                                    <li> <a href="{{ route('login') }}" aria-haspopup="true" aria-expanded="false"><i
                                                class="fa fa-user-circle" aria-hidden="true"></i> Login
                                        </a>
                                    </li>
                                    <li> <a href="{{ route('register') }}" aria-haspopup="true"
                                            aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i>
                                            Register
                                        </a>
                                    </li>
                                @else
                                    <li class="dropdown"> <a href="#" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i>
                                            {{ Auth::user()->name }}
                                            <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                        <ul class="dropdown-menu" style="z-index: 9999!important;">
                                            <li><a href="{{route('userpassword#changepage')}}">Update Password</a></li>
                                            <li>
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <button class="cu"><i class="fa fa-user-circle "
                                                            aria-hidden="true"></i>
                                                        Logout</button>
                                                </form>

                                            </li>
                                        </ul>
                                    </li>
                                @endif
                            </ul>
                        </nav>

                    </div><!-- /.navbar-collapse -->

                </nav>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>

    @yield('content')





    <!--- /footer-top ---->
    <!---copy-right ---->
    <div class="copy-right">
        <div class="container">

            <div class="footer-social-icons wow fadeInDown animated animated" data-wow-delay=".5s"
                style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
                <ul>
                    <li><a class="facebook" href="#"><span>Facebook</span></a></li>
                    <li><a class="twitter" href="#"><span>Twitter</span></a></li>
                    <li><a class="flickr" href="#"><span>Flickr</span></a></li>
                    <li><a class="googleplus" href="#"><span>Google+</span></a></li>
                    <li><a class="dribbble" href="#"><span>Dribbble</span></a></li>
                </ul>
            </div>
            <p class="wow zoomIn animated animated" data-wow-delay=".5s"
                style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> All Rights Reserved </p>
        </div>
    </div>

    @yield('script')
</body>

</html>
