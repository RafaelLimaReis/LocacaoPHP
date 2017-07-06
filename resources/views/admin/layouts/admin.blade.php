<!DOCTYPE html>
<html style="height: auto; min-height: 100%;">
    <head>
         <meta charset="UTF-8"/>
        <title>Locação | @yield('title', 'Admin')</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'/>
        <link rel="stylesheet" type="text/css" href="{!!asset('css/admin.css')!!}">

    </head>
    <body class="skin-green-light sidebar-mini " style="height: auto; min-height: 100%;">
        <div class="wrapper" style="height: auto; min-height: 100%;">
            <header class="main-header">
                <a href="{{route('admin.home')}}" class="logo">
                    Locação
                </a>
                <nav class="navbar navbar-static-top" role="navigation">
                  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                  </a>
                  <div class="navbar-custom-menu">
                      <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" arial-expanded="false">
                            <span>{{Auth::user()->name}}</span>
                            </a>
                            <ul class="dropdown-menu">
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-success btn-flat">Perfil</a>
                                </div>
                                <div class="pull-right">
                                    {!!link_to_route('admin.logout','Sair',null,['class' => 'btn btn-default btn-flat'])!!}
                                </div>
                            </li>
                            </ul>
                        </li>
                      </ul>
                  </div>
                </nav>
            </header>
            @include('admin.layouts.sidebar')
            <div class="content-wrapper">
                 @yield('content')
            </div>
        </div>
        <script type="text/javascript" src="{{asset('js/libs.min.js')}}"></script>
    </body>

</html>
