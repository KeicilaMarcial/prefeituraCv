<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Cvs|Pmsm</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('style/assets/img/favicon.ico')}}">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('style/assets/css/bootstrap.min.css')}}">
    <!-- Bootstrap CSS
		============================================ -->
    <!--<link rel="stylesheet" href="{{asset('style/assets/css/font-awesome.min.css')}}">-->
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('style/assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('style/assets/css/owl.theme.css')}}">
    <link rel="stylesheet" href="{{asset('style/assets/css/owl.transitions.css')}}">
    <!-- meanmenu CSS
		============================================ -->
   <!-- <link rel="stylesheet" href="{{asset('style/assets/css/meanmenu/meanmenu.min.css')}}">-->
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('style/assets/css/animate.css')}}">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('style/assets/css/normalize.css')}}">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('style/assets/css/scrollbar/jquery.mCustomScrollbar.min.css')}}">
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('style/assets/css/jvectormap/jquery-jvectormap-2.0.3.css')}}">
    <!-- notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('style/assets/css/notika-custom-icon.css')}}">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('style/assets/css/wave/waves.min.css')}}">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('style/assets/css/main.css')}}">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('style/assets/style.css')}}">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="{{asset('style/assets/css/responsive.css')}}">
    <!-- modernizr JS
		============================================ -->
    <script src="{{asset('style/assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    @yield('head')
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Start Header Top Area -->
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                       <img src="{{asset('style/assets/img/logo/logo.png')}}" alt="" />
                    </div>
                   
                </div>
                
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">
                        <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-menus"></i></span></a>
                                <div role="menu" class="dropdown-menu message-dd task-dd animated zoomIn">
                                    <div class="hd-mg-tt">
                                        <h2> <lable> {{Auth::user()->name }} - @if(Auth::user()->permission==1) ADM
                                        @else
                                        Sem Permissões de  Administrador
                                          @endif</label>
</h2>
                                    </div>
                                    <div class="hd-message-info hd-task-info">
                                        <div class="skill">
                                            <div class="progress">
                                                <div class="lead-content">
                                                <a  href="{{route('resetPassword')}}"> <img src="{{asset('style/assets/img/senha.svg')}}" width="30" height="30" alt=""/></a>
                                                
                                                </div>
                                                
                                           </div>
                                            <div class="progress">
                                                <div class="lead-content">
                                               
                                                <a  href="{{ route('logout') }}"
                                                      onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">                                     
                                                            <img src="{{asset('style/assets/img/logout.png')}}" width="30" height="30" alt=""/>
                                                    </a>
                                                   
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </div>
                                         
                                        </div>
                                    </div>
                                    
                                </div>
                            </li>
                          
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area -->
   
    <!-- Main Menu area start-->
    <div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                    @yield('nav-bar')
            </div>
        </div>
    </div>
     <!-- Main Menu area End-->
    <!-- Start Status area -->
    <div class="notika-status-area">
        <div class="container">
           @yield('cards')
    </div>
    <br>
    <!-- End Sale Statistic area-->
    <!-- Start Email Statistic area-->
    <div class="notika-email-post-area">
        <div class="container">
                @yield('container1')
        </div>
    </div>
    <!-- End Email Statistic area-->
   
   
    <!-- End Footer area-->
    <!-- jquery
		============================================ -->
    <script src="{{asset('style/assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="{{asset('style/assets/js/bootstrap.min.js')}}"></script>
    <!-- wow JS
		============================================ -->
   <!-- <script src="{{asset('style/assets/js/wow.min.js')}}"></script>-->
    <!-- price-slider JS
		============================================ -->
    <!--<script src="{{asset('style/assets/js/jquery-price-slider.js')}}"></script>-->
    <!-- owl.carousel JS
		============================================ -->
   <!-- <script src="{{asset('style/assets/js/owl.carousel.min.js')}}"></script>-->
    <!-- scrollUp JS
		============================================ -->
    <script src="{{asset('style/assets/js/jquery.scrollUp.min.js')}}"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="{{asset('style/assets/js/meanmenu/jquery.meanmenu.js')}}"></script>
    <!-- counterup JS
		============================================ -->
    <script src="{{asset('style/assets/js/counterup/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('style/assets/js/counterup/waypoints.min.js')}}"></script>
    <script src="{{asset('style/assets/js/counterup/counterup-active.js')}}"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="{{asset('style/assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <!-- jvectormap JS
		============================================ -->
    <script src="{{asset('style/assets/js/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('style/assets/js/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('style/assets/js/jvectormap/jvectormap-active.js')}}"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="{{asset('style/assets/js/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('style/assets/js/sparkline/sparkline-active.js')}}"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="{{asset('style/assets/js/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('style/assets/js/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('style/assets/js/flot/curvedLines.js')}}"></script>
    <script src="{{asset('style/assets/js/flot/flot-active.js')}}"></script>
    <!-- knob JS
		============================================ -->
    <script src="{{asset('style/assets/js/knob/jquery.knob.js')}}"></script>
    <script src="{{asset('style/assets/js/knob/jquery.appear.js')}}"></script>
    <script src="{{asset('style/assets/js/knob/knob-active.js')}}"></script>
    <!--  wave JS
		============================================ -->
    <script src="{{asset('style/assets/js/wave/waves.min.js')}}"></script>
    <script src="{{asset('style/assets/js/wave/wave-active.js')}}"></script>
    <!--  todo JS
		============================================ -->
    <script src="{{asset('style/assets/js/todo/jquery.todo.js')}}"></script>
    <!-- plugins JS
		============================================ -->
   <!-- <script src="{{asset('style/assets/js/plugins.js')}}"></script>-->
	<!--  Chat JS
		============================================ -->
    <script src="{{asset('style/assets/js/chat/moment.min.js')}}"></script>
   <!-- <script src="{{asset('style/assets/js/chat/jquery.chat.js')}}"></script>-->
    <!-- main JS
		============================================ -->
   <!-- <script src="{{asset('style/assets/js/main.js')}}"></script>-->
	<!-- tawk chat JS
		============================================ -->
    <!--<script src="{{asset('style/assets/js/tawk-chat.js')}}"></script>-->
    @yield('script')
    <!-- Input Mask JS-->
</body>

</html>


