<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LARAVEL CRUD | Databel </title>
    <link rel="stylesheet" href="{{ URL::asset('bootstrap-3.3.6-dist/css/bootstrap.min.css') }}">    
    <link rel="stylesheet" href="{{ URL::to('font-awesome-4.6.3/css/font-awesome.min.css') }}"> 
    <link rel="stylesheet" href="{{ URL::asset('css/jquery.dataTables.min.css') }}">
    <link href="{{ URL::to('css/app.css') }}" rel="stylesheet"> 
    <link href="{{ URL::to('css/fullcalendar.css') }}" rel="stylesheet"> 
    <link href="{{ URL::to('css/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet"> 
    <link href="{{ URL::to('css/custom.css') }}" rel="stylesheet">
  </head>

  <body class="nav-sm">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                    @include('layouts.menu')
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

     
        <!-- top navigation -->
        <div class="top_nav" class="hidden-print">
          <div class="nav_menu" class="hidden-print">
            <nav class="hidden-print" role="navigation" >
              <div class="nav toggle" class="hidden-print">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <a class="navbar-brand" href="{{ url('/') }}" style="padding: 0px 0 0 0;">
                <img src="{{ url('/images/logo.png')}}" width="220px" >
              </a>
              <ul class="nav navbar-nav navbar-right hidden-print" >
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    <i class="fa fa-btn fa-user"></i> User Name <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu" role="menu">
                      <li><a href="#"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                  </ul>
                </li>
               
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
     

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            @yield('content')
          </div>
        </div>
        <!-- /page content -->
      </div>
    </div>

    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('bootstrap-3.3.6-dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/fastclick/lib/fastclick.js') }}"></script>
    <script src="{{ URL::asset('css/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ URL::asset('js/custom.js') }}"></script>

    @stack('scripts')

</body>
</html>