<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/admin/images/favicon.ico') }}">

    <!-- third party css -->
    <link href="{{ asset('assets/admin/css/vendor/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
    <link href="{{ asset('assets/admin/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/css/vendor/buttons.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/css/vendor/select.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/css/vendor/fixedHeader.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/css/vendor/fixedColumns.bootstrap5.css') }}" rel="stylesheet" type="text/css" />

</head>

<body class="loading" data-layout-color="light" data-leftbar-theme="light" data-layout-mode="fluid" data-rightbar-onstart="true">
    <!-- Begin page -->
    <div class="wrapper">
        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu">

            <!-- LOGO -->
            <a href="index.html" class="logo text-center">
                <span class="logo-lg">
                    <img src="{{ asset('assets/admin/images/logo.png') }}" alt="">
                </span>
                <span class="logo-sm">
                    <img src="{{ asset('assets/admin/images/logo_sm.png') }}" alt="">
                </span>
            </a>

            @include('admin.layouts.sidebar')

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <div class="navbar-custom">
                    <ul class="list-unstyled topbar-menu float-end mb-0">
                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" href="{{ route('profil.index') }}">
                                <span class="account-user-avatar">
                                    <img src="{{ asset('storage/user/' . auth()->user()->image) }}" alt="user-image" class="rounded-circle">
                                </span>
                                <span>
                                    <span class="account-user-name">{{ auth()->user()->nama }}</span>
                                    <span class="account-position">{{ auth()->user()->role }}</span>
                                </span>
                            </a>
                        </li>

                    </ul>
                    <button class="button-menu-mobile open-left">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </div>
                <!-- end Topbar -->

                <!-- Start Content-->
                <div class="container-fluid">
                    @yield ('content')
                </div>
                <!-- <div class="content-page">
                    <div class="content">
                        
                    </div>
                </div> -->
                <!-- container -->

            </div>
            <!-- content -->

            <!-- Footer Start -->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> © Wea5ley - Team
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end footer-links d-none d-md-block">
                                <a href="https://www.instagram.com/baticraft.app?igsh=N3gxNGVlNjI3dXps">Instagram</a>
                                <!-- <a href="https://github.com/triayn/BaticraftWeb">Github</a> -->
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <div class="rightbar-overlay"></div>
    <!-- /End-bar -->

    <!-- Drag and Drop Image (Create.User) -->

    @yield ('scripts')
    <script src="{{ asset('assets/admin/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('assets/admin/js/pages/demo.dashboard.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/dataTables.checkboxes.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/fixedColumns.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/fixedHeader.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/pages/demo.datatable-init.js') }}"></script>
    <script src="{{ asset('assets/admin/js/pages/demo.products.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/gmaps.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/pages/demo.google-maps.js') }}"></script>
</body>

<!-- Mirrored from coderthemes.com/hyper/saas/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 29 Jul 2022 10:20:07 GMT -->

</html>