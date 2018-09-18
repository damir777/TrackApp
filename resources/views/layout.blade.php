<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TrackApp</title>

    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('font-awesome/css/font-awesome.min.css') }}

    {{ HTML::style('css/animate.min.css') }}
    {{ HTML::style('css/style.min.css') }}

    {{ HTML::style('css/plugins/dataTables/datatables.min.css') }}

    {{ HTML::script('js/jquery-3.1.1.min.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}

    {{ HTML::script('js/plugins/metisMenu/jquery.metisMenu.js') }}
    {{ HTML::script('js/plugins/slimscroll/jquery.slimscroll.min.js') }}
    {{ HTML::script('js/plugins/pace/pace.min.js') }}
    {{ HTML::script('js/plugins/dataTables/datatables.min.js') }}

    {{ HTML::script('js/inspinia.js') }}
</head>
<body>

<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <h1 class="profile-element text-center" style="margin: 0; padding: 0;">TrackApp</h1>
                    <div class="logo-element">
                        TA+
                    </div>
                </li>
                <li>
                    <a href="{{ route('GetUsers') }}">
                        <i class="fa fa-user-o"></i> <span class="nav-label">Users</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary" href="#"><i class="fa fa-bars"></i> </a>
                </div>
            </nav>
        </div>
        @yield('content')
    </div>
</div>

</body>
</html>