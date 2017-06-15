<!DOCTYPE html>
<html style="height: auto; min-height: 100%;">
    <head>
        <title></title>
         <meta charset="UTF-8"/>
        <title>Locação | @yield('title', 'App')</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'/>
        <link rel="stylesheet" type="text/css" href="{!!asset('css/app.css')!!}">

    </head>
    <body class="skin-green-light sidebar-mini " style="height: auto; min-height: 100%;">
        <div class="wrapper" style="height: auto; min-height: 100%;">
            <header class="main-header">
                <a href="#" class="logo">
                    Locação
                </a>
                <nav class="navbar navbar-static-top" role="navigation">
                  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                  </a>
                </nav>
            </header>
            @include('app.layouts.sidebar')
            <div class="content-wrapper">
                 @yield('content')
            </div>
        </div>
        <script type="text/javascript" src="{{asset('js/libs.min.js')}}"></script>
    </body>

</html>