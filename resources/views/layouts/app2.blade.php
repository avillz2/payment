
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from mannatthemes.com/dastone/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Dec 2020 21:38:59 GMT -->
<head>
        <meta charset="utf-8" />
        <title>Dastone - Admin & Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="bassets/images/favicon.ico">

        <!-- jvectormap -->
        <link href="{{asset('/bassets/plugins/jvectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet">
        <link href="{{asset('/bassets/plugins/dropify/css/dropify.min.css')}}" rel="stylesheet">

        <!-- App css -->
        <link href="{{asset('/bassets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('/bassets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('/bassets/css/metisMenu.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('/bassets/plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('/bassets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

    </head>

    <body>
        <!-- Left Sidenav -->
        <div class="left-sidenav">
            <!-- LOGO -->
            <div class="brand">
                <a href="index.html" class="logo">
                    <span>
                        <img src="{{asset('/bassets/images/logo-sm.png')}}" alt="logo-small" class="logo-sm">
                    </span>
                    <span>
                        <img src="{{asset('/bassets/images/logo.png')}}" alt="logo-large" class="logo-lg logo-light">
                        <img src="{{asset('/bassets/images/logo-dark.png')}}" alt="logo-large" class="logo-lg logo-dark">
                    </span>
                </a>
            </div>
            <!--end logo-->
            <div class="menu-content h-100" data-simplebar>
                <ul class="metismenu left-sidenav-menu">


                <li>
                        <a href="home"><i data-feather="layers" class="align-self-center menu-icon"></i><span>Home</span></a>
             </li>

             @role('managers')
             <li>
                <a href="permission"><i data-feather="layers" class="align-self-center menu-icon"></i><span>permission</span></a>
               </li>
               @endrole
               @role('managers')
        <li>
        <a href="role"><i data-feather="layers" class="align-self-center menu-icon"></i><span>Role</span></a>
        </li>
        @endrole

        @role('managers')
    <li>
    <a href="user"><i data-feather="layers" class="align-self-center menu-icon"></i><span>Users</span></a>
    </li>
    @endrole


    <li>
        <a href="product"><i data-feather="layers" class="align-self-center menu-icon"></i><span>Product</span></a>
     </li>
     @role('managers')
        <li>
            <a href="product/create"><i data-feather="layers" class="align-self-center menu-icon"></i><span>create</span></a>
         </li>
    @endrole

    <li>
    <a href="profile"><i data-feather="layers" class="align-self-center menu-icon"></i><span>Profile</span></a>
    </li>



                </ul>

            </div>
        </div>
        <!-- end left-sidenav-->


        <div class="page-wrapper">
            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- Navbar -->
                <nav class="navbar-custom">
                    <ul class="list-unstyled topbar-nav float-right mb-0">

                        <li class="dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <span class="ml-1 nav-user-name hidden-sm">Nick</span>
                                <img src="bassets/images/users/user-5.jpg" alt="profile-user" class="rounded-circle thumb-xs" />
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#"><i data-feather="user" class="align-self-center icon-xs icon-dual mr-1"></i> Profile</a>
                                <a class="dropdown-item" href="#"><i data-feather="settings" class="align-self-center icon-xs icon-dual mr-1"></i> Settings</a>
                                <div class="dropdown-divider mb-0"></div>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                            </div>
                        </li>
                    </ul><!--end topbar-nav-->

                    <ul class="list-unstyled topbar-nav mb-0">
                        <li>
                            <button class="nav-link button-menu-mobile">
                                <i data-feather="menu" class="align-self-center topbar-icon"></i>
                            </button>
                        </li>
                        <li class="creat-btn">
                            <div class="nav-link">
                                <a class=" btn btn-sm btn-soft-primary" href="#" role="button"><i class="fas fa-plus mr-2"></i>New Task</a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- end navbar-->
            </div>
            <!-- Top Bar End -->
                           <!-- Page Content-->
            <div class="page-content">
                <div class="container-fluid">


                    @include('inc.messages')
                    @yield('content')


                </div><!-- container -->

                <footer class="footer text-center text-sm-left">
                    &copy; 2020 Dastone <span class="d-none d-sm-inline-block float-right">Crafted with <i class="mdi mdi-heart text-danger"></i> by Mannatthemes</span>
                </footer><!--end footer-->
                </div>
                <!-- end page content -->
                </div>
                <!-- end page-wrapper -->




                <!-- jQuery  -->
                <script src="{{asset('/bassets/js/jquery.min.js')}}"></script>
                <script src="{{asset('/bassets/js/bootstrap.bundle.min.js')}}"></script>
                <script src="{{asset('/bassets/js/metismenu.min.js')}}"></script>
                <script src="{{asset('/bassets/js/waves.js')}}"></script>
                <script src="{{asset('/bassets/js/feather.min.js')}}"></script>
                <script src="{{asset('/bassets/js/simplebar.min.js')}}"></script>
                <script src="{{asset('/bassets/js/moment.js')}}"></script>
                <script src="{{asset('/bassets/plugins/daterangepicker/daterangepicker.js')}}"></script>

                <script src="{{asset('/bassets/plugins/apex-charts/apexcharts.min.js')}}"></script>
                <script src="{{asset('/bassets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
                <script src="{{asset('/bassets/plugins/jvectormap/jquery-jvectormap-us-aea-en.js')}}"></script>
                <script src="{{asset('/bassets/pages/jquery.analytics_dashboard.init.js')}}"></script>


                <script src="{{asset('/bassets/plugins/dropify/js/dropify.min.js')}}"></script>
                <script src="{{asset('/bassets/pages/jquery.form-upload.init.js')}}"></script>

                <!-- App js -->
                <script src="{{asset('/bassets/js/app.js')}}"></script>

                </body>


                <!-- Mirrored from mannatthemes.com/dastone/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 04 Dec 2020 21:38:59 GMT -->
                </html>
