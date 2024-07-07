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
        .dropdown-menu {
            background-color: green;
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
        <div class="container">
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
                                <li><a href="index.php">Home</a></li>
                                <li><a href="page.php?type=aboutus">About</a></li>
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
                                            <li><a href="">Profile Settings</a></li>
                                            <li><a href="">Update Password</a></li>
                                            <li><a href="">My Booking</a></li>
                                            <li><a href="">Post a Testimonial</a></li>
                                            <li><a href="">My Testimonial</a></li>
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

    <!--- routes ---->
    <div class="routes">
        <div class="container">
            <div class="col-md-4 routes-left wow fadeInRight animated" data-wow-delay=".5s">
                <div class="rou-left">
                    <a href="#"><i class="glyphicon glyphicon-list-alt"></i></a>
                </div>
                <div class="rou-rgt wow fadeInDown animated" data-wow-delay=".5s">
                    <h3>80000</h3>
                    <p>Enquiries</p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-4 routes-left">
                <div class="rou-left">
                    <a href="#"><i class="fa fa-user"></i></a>
                </div>
                <div class="rou-rgt">
                    <h3>1900</h3>
                    <p>Registered users</p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-4 routes-left wow fadeInRight animated" data-wow-delay=".5s">
                <div class="rou-left">
                    <a href="#"><i class="fa fa-ticket"></i></a>
                </div>
                <div class="rou-rgt">
                    <h3>7,00,00,000+</h3>
                    <p>Booking</p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    @yield('script')
</body>

</html>
