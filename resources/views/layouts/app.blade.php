<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIPAWON - Sistem Pelayanan Angkutan Wonosobo</title>
    <link rel="icon" href="{{ asset('favicon_io/favicon-32x32.png') }}" type="image/png" />
    <meta name="description" content="SIPAWON - Sistem Pelayanan Angkutan Wonosobo">
    <meta name="author" content="Disperkimhub">
    <meta name="keyword" content="SIPAWON">


    <!--plugins-->
    <link href="{{ asset('roksyn/ltr/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link href="{{ asset('roksyn/ltr/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('roksyn/ltr/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet">
    <link href="{{ asset('roksyn/ltr/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">

    <!-- loader-->
    <link href="{{ asset('roksyn/ltr/assets/css/pace.min.css') }}" rel="stylesheet">
    <script src="{{ asset('roksyn/ltr/assets/js/pace.min.js') }}"></script>
    <!--Styles-->
    <link href="{{ asset('roksyn/ltr/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="{{ asset('roksyn/ltr/assets/css/icons.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="{{ asset('roksyn/ltr/assets/css/extra-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('roksyn/ltr/assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('roksyn/ltr/assets/css/dark-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('roksyn/ltr/assets/css/semi-dark-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('roksyn/ltr/assets/css/minimal-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('roksyn/ltr/assets/css/shadow-theme.css') }}" rel="stylesheet">

    @stack('css')
    @vite([])

</head>

<body>

    <!--start header-->
    <header class="top-header">
        <nav class="navbar navbar-expand justify-content-between">
            <div class="btn-toggle-menu">
                <span class="material-symbols-outlined">menu</span>
            </div>
            <span>
                Dinas Perumahan Kawasan Permukiman Dan Perhubungan Kabupaten Wonosobo
            </span>
            <ul class="navbar-nav top-right-menu gap-2">
                <ul class="gap-2 navbar-nav top-right-menu">
                    <li class="nav-item dark-mode">
                        <a class="nav-link dark-mode-icon" href="javascript:;"><span
                                class="material-symbols-outlined">dark_mode</span></a>
                    </li>
                    <li class="nav-item dropdown dropdown-app">
                        <div class="dropdown-menu dropdown-menu-end mt-lg-2 p-0">
                            <div class="app-container p-2 my-2">
                                <div class="row gx-0 gy-2 row-cols-3 justify-content-center p-2">
                                </div><!--end row-->
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown dropdown-large">
                        <div class="dropdown-menu dropdown-menu-end mt-lg-2">
                            <a href="javascript:;">
                            </a>
                            <div class="header-notifications-list">
                                <a class="dropdown-item" href="javascript:;">
                                </a>
                            </div>
                            <a href="javascript:;">
                            </a>
                        </div>
                    </li>
                </ul>
        </nav>
    </header>
    <!--end header-->

    <!--start sidebar-->
    <aside class="sidebar-wrapper">
        <div class="sidebar-header">
            <div class="logo-icon">
                <img src="assets/images/logo-icon.png" class="logo-img" alt="">
            </div>
            <div class="logo-name d-flex align-items-center">
                <img src="{{ asset('logo.png') }}" alt="Logo 1" height="30" class="me-1">
                <img src="{{ asset('dishub.png') }}" alt="Logo 2" height="30" class="me-2">
                <h5 class="">SIPAWON</h5>
            </div>
            <div class="sidebar-close ">
                <span class="material-symbols-outlined">close</span>
            </div>
        </div>

        @include('layouts.sidebar') <!-- Create a partial for the sidebar -->

        <div class="sidebar-bottom dropdown dropup-center dropup">
            <div class="dropdown-toggle d-flex align-items-center px-3 gap-3 w-100 h-100" data-bs-toggle="dropdown">
                <div class="user-img">
                    <img src="{{ asset('dishub.png') }}" alt="">
                </div>
                <div class="user-info">
                    <h5 class="mb-0 user-name">{{ auth()->user()->name ?? ' ' }}</h5>
                    {{-- <p class="mb-0 user-designation">UI Engineer</p> --}}
                </div>
            </div>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <span class="material-symbols-outlined me-2">
                            logout
                        </span><span>Logout</span>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </a>
                </li>
            </ul>
        </div>

    </aside>
    <!--end sidebar-->

    <!--start main content-->
    <main class="page-content">
        @yield('content')
        {{ $slot ?? '' }}
    </main>
    <!--end main content-->

    <!--start overlay-->
    <div class="overlay btn-toggle-menu"></div>
    <!--end overlay-->

    <!--plugins-->
    <script src="{{ asset('roksyn/ltr/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('roksyn/ltr/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('roksyn/ltr/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('roksyn/ltr/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('roksyn/ltr/assets/plugins/apex/apexcharts.min.js') }}"></script>
    <script src="{{ asset('roksyn/ltr/assets/js/index.js') }}"></script>

    <script src="{{ asset('roksyn/ltr/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('roksyn/ltr/assets/js/main.js') }}"></script>

    <script src="{{ asset('roksyn/ltr/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('roksyn/ltr/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    {{-- <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('js')
    @livewireScripts
    @livewireChartsScripts

</body>

</html>
