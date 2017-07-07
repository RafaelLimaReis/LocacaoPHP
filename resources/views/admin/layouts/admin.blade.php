<!DOCTYPE html>
<html>
    <head>
         <meta charset="UTF-8"/>
        <title>Locação | @yield('title', 'Admin')</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'/>
        <link rel="stylesheet" type="text/css" href="{!!asset('css/admin.css')!!}">
    </head>
    <body id="nifty-ready">
        <div id="container" class="effect mainnav-lg">
          <nav id="navbar">
            <div id="navbar-container" class="boxed">
              <div class="navbar-header">
                <!-- title -->
                <a href="#" class="navbar-brand">
                  <div class="brand-title">
                    <span class="brand-text mar-lft">
                      Admin Locação
                    </span>
                  </div>
                </a>
              </div>
              <div class="navbar-content clearfix">
                <ul class="nav navbar-top-links pull-left">
                  <!-- Toggle navigator -->
                  <li class="tlg-menu-btn">
                    <a href="#" class="mainnav-toggle">
                      <i class="fa fa-navicon fa-lg"></i>
                    </a>
                  </li>
                </ul>
                <ul class="nav navbar-top-links pull-right">
                  <li class="dropdown-user" class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                      <span>{{Auth::user()->name}}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                      <div class="pull-left" style="margin: 10px;">
                        <a href="#" class="btn btn-default btn-flat">
                          Perfil
                        </a>
                      </div>
                      <div class="pull-right mar-all" style="margin: 10px;">
                        <a href="{!! url('/logout') !!}" class="btn btn-default btn-flat">
                          Sair
                        </a>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          <!-- Left side column. contains the logo and sidebar -->
          @include('admin.layouts.sidebar')
          <!-- Content. Contains page content -->
          <div id="content-container">
            @yield('content')
          </div>
          <!-- Main Footer -->
          <footer id="footer" style="text-align: center;">
            <strong>
              Copyright © 2017 <a href="#">Locação</a>.
            </strong>
            All rights reserved.
          </footer>
        </div>
    </body>
    <script type="text/javascript" src="{{asset('js/libs.js')}}"></script>
</html>
