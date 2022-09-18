<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Head -->

<head>
    <meta charset="utf-8" />
    <title>Event App</title>

    <meta name="description" content="Dashboard" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="{{ asset('img_assets/favicon.png') }}" type="image/x-icon">

    <!--Basic Styles-->
    <link href="{{ asset('plugin_assets/bootstraps-v3.3.6/bootstrap.min.css') }}" rel="stylesheet" />
    <link id="bootstrap-rtl-link" href="" rel="stylesheet" />
    <link href="{{ asset('plugin_assets/weather-icons/weather-icons.min.css') }}" rel="stylesheet" />

    <!--Beyond styles-->
    <link id="beyond-link" href="{{ asset('dashboard_assets/css/beyond.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard_assets/css/demo.min.css') }}" rel="stylesheet" />
    <link id="skin-link" href="" rel="stylesheet" type="text/css" />
    
    {{-- plugins --}}
    <link href="{{ asset('plugin_assets/typicons/typicons.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugin_assets/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugin_assets/fontawesome-5.14.0/css/all.css') }}" rel="stylesheet">
    <script src="{{ asset('plugin_assets/sweetalert/sweetalert.min.js') }}"></script>

    {{-- IMPORTANT THINGS --}}
    <script src="{{ asset('dashboard_assets/js/skins.min.js') }}"></script>
    <link href="{{ asset('img_assets/favicon.png') }}" rel="icon">
    <link rel="stylesheet" href="{{ asset('dashboard_assets/css/operator.css') }}">

    <!-- include summernote css/js -->
    <link href="{{ asset('plugin_assets/summernote-0.8.18/summernote.min.css') }}" rel="stylesheet">

    <link href="{{ asset('plugin_assets/summernote-0.8.18/summernote.min.css') }}" rel="stylesheet">
    <link href="{{ asset('dashboard_assets/css/main.css') }}" rel="stylesheet" type="text/css" />

    @yield('custom-style')
</head>
<!-- /Head -->
<!-- Body -->

<body>
    <!-- Loading Container -->
    <div class="loading-container">
        <div class="loader"></div>
    </div>
    <!--  /Loading Container -->
    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="navbar-container">
                <!-- Navbar Barnd -->
                <div class="navbar-header pull-left">
                    <a href="#" class="navbar-brand">
                        <small>
                            <img src="{{ asset('img_assets/logo.png') }}" style="width: 80%; height: 40px; object-fit: contain" alt="" srcset="">
                        </small>
                    </a>
                </div>
                <!-- /Navbar Barnd -->
                <!-- Sidebar Collapse -->
                <div class="sidebar-collapse" id="sidebar-collapse">
                    <i class="collapse-icon fa fa-bars"></i>
                </div>
                <!-- /Sidebar Collapse -->
                <!-- Account Area and Settings --->
                <div class="navbar-header pull-right">`
                    <div class="navbar-account">
                        <ul class="account-area" style="right: 0px">
                            <li style="padding-top: 13px;color:white;font-weight:bold">Hallo,
                                {{ auth()->user()->name }}
                            </li>
                            <li>
                                <a class=" dropdown-toggle" data-toggle="dropdown" title="Notifications" href="#">
                                    <i class="icon glyphicon glyphicon-cog"></i>
                                </a>
                                <!--Notification Dropdown-->
                                <ul class="pull-right dropdown-menu dropdown-arrow dropdown-notifications">
                                    <li>
                                        <a href="#">
                                            <div class="clearfix">
                                                <div class="notification-icon">
                                                    <i class="fa fa-key bg-themeprimary white"></i>
                                                </div>
                                                <div class="notification-body" style="padding-top: 8px">
                                                    <span class="title">Ganti Password</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit()">
                                            <div class="clearfix">
                                                <div class="notification-icon">
                                                    <i class="fa fa-user bg-themeprimary white"></i>
                                                </div>
                                                <div class="notification-body" style="padding-top: 8px">
                                                    <span class="title">
                                                        Keluar
                                                    </span>
                                                    <form id="logout-form" action="{{ route('logout') }}"
                                                        method="POST" style="display: none">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <!--/Notification Dropdown-->
                                </>
                        </ul>

                    </div>
                </div>
                <!-- /Account Area and Settings -->
            </div>
        </div>
    </div>
    <!-- /Navbar -->
    <!-- Main Container -->
    <div class="main-container container-fluid">
        <!-- Page Container -->
        <div class="page-container">
            <!-- Page Sidebar -->
            <div class="page-sidebar" id="sidebar">
                <!-- Sidebar Menu -->
                @if (auth()->user()->user_level == "Admin")
                    @include('partials.sidebar_admin')
                @else
                    @include('partials.sidebar_user')
                @endif
                <!-- /Sidebar Menu -->
            </div>
            <!-- /Page Sidebar -->

            <!-- /Chat Bar -->
            <!-- Page Content -->
            <div class="page-content">
                <!-- Page Header -->
                <div class="page-header position-relative">
                    <div class="header-title">
                        <h1>
                            @yield('title')
                        </h1>
                    </div>
                    <!--Header Buttons-->
                    <div class="header-buttons">
                        <a class="sidebar-toggler" href="#">
                            <i class="fa fa-arrows-h"></i>
                        </a>
                        <a class="refresh" id="refresh-toggler">
                            <i class="glyphicon glyphicon-refresh"></i>
                        </a>
                        <a class="fullscreen" id="fullscreen-toggler" href="#">
                            <i class="glyphicon glyphicon-fullscreen"></i>
                        </a>
                    </div>
                    <!--Header Buttons End-->
                </div>
                <!-- /Page Header -->
                <!-- Page Body -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            @yield('content')
                        </div>
                    </div>
                </div>
                <!-- /Page Body -->
            </div>
            <!-- /Page Content -->

        </div>
        <!-- /Page Container -->
        <!-- Main Container -->

    </div>

    <!--Basic Scripts-->
    <script src="{{ asset('plugin_assets/jquery-2.1.3/jquery.min.js') }}"></script>
    <script src="{{ asset('plugin_assets/bootstraps-v3.3.6/bootstrap.min.js') }}"></script>
    <script src="{{ asset('plugin_assets/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('plugin_assets/bootstrap-select/dist/js/bootstrap-select.js') }}"></script>

    <!--Beyond Scripts-->
    <script src="{{ asset('dashboard_assets/js/beyond.js') }}"></script>

    <script src="{{ asset('plugin_assets/select2/select2.min.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $(".select2").select2({
                placeholder: "Pilih",
                allowClear: true,
            });
        });
    </script>
    <script src="{{ asset('plugin_assets/summernote-0.8.18/summernote.min.js') }}"></script>
    @yield('footer-scripts')
</body>
<!--  /Body -->

</html>
