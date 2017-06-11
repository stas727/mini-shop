<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="_token" content="{!! csrf_token() !!}">
    <link rel="shortcut icon" href="">
    <title></title>

    <link href="{!!  asset('assets/admin/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!!  asset('assets/admin/font-awesome/css/font-awesome.css')!!}" rel="stylesheet">
    <!-- Toastr style -->

    <link href="{!!  asset('assets/admin/css/animate.css') !!}" rel="stylesheet">
    <link href="{!!  asset('assets/admin/css/style.css') !!}" rel="stylesheet">
    @yield('css')
    {{--   <script>
           UPLOADCARE_PUBLIC_KEY = '618ecaa6a7c33dc1d396';
       </script>--}}

</head>
<body class="pace-done">

<div id="wrapper">
    <!-- left side bar-->
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    @if(Auth::check())
                        <div class="dropdown profile-element"> <span>

                                    <img alt="image" id="logoImage" class=" lfm" style="width: 100%; height: 100%;"
                                         src="{!! url('images/2BKKR-Shop-Local-Logo1.png') !!}"/>
                                </span>
                            {{--   <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                                       <span class="clear"> <span class="block m-t-xs"> <strong
                                                       class="font-bold">Admin</strong>
                                           </span> <span class="text-muted text-xs block">еще <b class="caret"></b></span> </span>
                               </a>--}}
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <a href="{{ url('/admin') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> Выход
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </ul>
                        </div>
                    @endif
                    <div class="logo-element">
                        AP
                    </div>
                </li>
                @if(Auth::check())
                    <li>
                        <a href="{{ url(Config::get('const.ADMIN_URL').'/products') }}"><i class="fa fa-exclamation"></i> <span
                                    class="nav-label">{!! trans('AdminNavbar.products') !!}</span></a>
                    </li>
                    <li>
                        <a href="{{ url(Config::get('const.ADMIN_URL').'/parser') }}"><i class="fa fa-cloud-download"></i> <span
                                    class="nav-label">{!! trans('AdminNavbar.parser') !!}</span></a>
                    </li>
                    <li>
                        <a href="{{ url(Config::get('const.ADMIN_URL').'/categories') }}"><i class="fa fa-caret-square-o-down"></i> <span
                                    class="nav-label">{!! trans('AdminNavbar.categories') !!}</span></a>
                    </li>

                    </li>

                @endif
            </ul>
        </div>
    </nav>
    <!-- /left side bar-->
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <!--header-->
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i>
                    </a>
                </div>
                <div class="navbar-header">
                    <h1 style="margin-left: 20px ;"> Admin Panel</h1>
                </div>
                <div id="messages" class="navbar-header" style="height: 20px; width: 30%; margin-left: 5%">
                </div>
                <ul class="nav navbar-top-links navbar-right" id="panel">
                    @if(Auth::check())
                        <li>
                            <a href="/" target="_blank"><span class="m-r-sm text-muted welcome-message"
                                                              title="Перейти на сайт"> <button
                                            class="btn btn-warning dim btn-bitbucket-dim" type="button" name="start">На сайт </button>  </span></a>
                        </li>
                        <li>
                            <span class="m-r-sm text-muted welcome-message">{!! asset('/') !!}</span>
                        </li>
                    @endif
                    <li>
                        <a href="{{ url('/admin') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i> Выход
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>

                </ul>

            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content">

                @yield('content')
                <!--                   Дополнительный контент-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mainly scripts -->

<script src="{!! asset('assets/admin/js/jquery-2.1.1.js') !!}"></script>
<script src="{!! asset('js/jquery-ui/jquery-ui.js') !!}"></script>
<script src="{!! asset('assets/admin/js/bootstrap.min.js') !!}"></script>
<script src="{!! asset('assets/admin/js/plugins/metisMenu/jquery.metisMenu.js') !!}"></script>
<script src="{!! asset('assets/admin/js/plugins/slimscroll/jquery.slimscroll.min.js') !!}"></script>
<script src="{!! asset('assets/admin/js/plugins/iCheck/icheck.min.js') !!}"></script>
{{--<script src="{{ asset('assets/admin/js/jquery-2.1.1.js') }}PLAGIN/jquery-cookie-master/src/jquery.cookie.js" type="text/javascript"></script>
<!-- Custom and plugin javascript -->--}}
<script src="{!! asset('assets/admin/js/inspinia.js') !!}"></script>
<script src="{!! asset('assets/admin/js/plugins/pace/pace.min.js') !!}"></script>
{{--<script src="{!! asset('assets/admin/editor/ckeditor.js') !!}"></script>--}}

@yield('scripts')
<script>
    $.ajaxSetup({
        headers: {'X-CSRF-Token': $('meta[name=_token]').attr('content')}
    })
    url = location.href;
    str = "a[href=" + "'" + url + "'" + "]";

    $(str).parent().addClass('active');
    $(str).parent().parent().parent().addClass('active');
</script>
</body>
</html>
