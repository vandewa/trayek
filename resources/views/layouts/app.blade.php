<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Roksyn - Bootstrap 5 Admin Template</title>

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('roksyn/ltr/assets/css/icons.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
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
            <div class="d-lg-block d-none search-bar">
                <button class="btn btn-sm w-100 d-flex align-items-center" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    <span class="material-symbols-outlined">search</span>Search
                </button>
            </div>
            <ul class="navbar-nav top-right-menu gap-2">
                <li class="nav-item d-lg-none d-block" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <a class="nav-link" href="javascript:;"><span class="material-symbols-outlined">
                            search
                        </span></a>
                </li>
                <li class="nav-item dark-mode">
                    <a class="nav-link dark-mode-icon" href="javascript:;"><span
                            class="material-symbols-outlined">dark_mode</span></a>
                </li>
                <li class="nav-item dropdown dropdown-app">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown"
                        href="javascript:;"><span class="material-symbols-outlined">
                            apps
                        </span></a>
                    <div class="dropdown-menu dropdown-menu-end mt-lg-2 p-0">
                        <div class="app-container p-2 my-2">
                            <div class="row gx-0 gy-2 row-cols-3 justify-content-center p-2">
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="assets/images/icons/slack.png" width="30" alt="">
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Slack</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="assets/images/icons/behance.png" width="30"
                                                    alt="">
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Behance</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="assets/images/icons/google-drive.png" width="30"
                                                    alt="">
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Dribble</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="assets/images/icons/outlook.png" width="30"
                                                    alt="">
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Outlook</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="assets/images/icons/github.png" width="30"
                                                    alt="">
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">GitHub</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="assets/images/icons/stack-overflow.png" width="30"
                                                    alt="">
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Stack</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="assets/images/icons/figma.png" width="30"
                                                    alt="">
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Stack</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="assets/images/icons/twitter.png" width="30"
                                                    alt="">
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Twitter</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="assets/images/icons/google-calendar.png" width="30"
                                                    alt="">
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Calendar</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="assets/images/icons/spotify.png" width="30"
                                                    alt="">
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Spotify</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="assets/images/icons/google-photos.png" width="30"
                                                    alt="">
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Photos</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="assets/images/icons/pinterest.png" width="30"
                                                    alt="">
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Photos</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="assets/images/icons/linkedin.png" width="30"
                                                    alt="">
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">linkedin</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="assets/images/icons/dribble.png" width="30"
                                                    alt="">
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Dribble</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="assets/images/icons/youtube.png" width="30"
                                                    alt="">
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">YouTube</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="assets/images/icons/google.png" width="30"
                                                    alt="">
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">News</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="assets/images/icons/envato.png" width="30"
                                                    alt="">
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Envato</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col">
                                    <a href="javascript:;">
                                        <div class="app-box text-center">
                                            <div class="app-icon">
                                                <img src="assets/images/icons/safari.png" width="30"
                                                    alt="">
                                            </div>
                                            <div class="app-name">
                                                <p class="mb-0 mt-1">Safari</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                            </div><!--end row-->

                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown dropdown-large">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                        data-bs-toggle="dropdown">
                        <div class="position-relative">
                            <span class="notify-badge">8</span>
                            <span class="material-symbols-outlined">
                                notifications_none
                            </span>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end mt-lg-2">
                        <a href="javascript:;">
                            <div class="msg-header">
                                <p class="msg-header-title">Notifications</p>
                                <p class="msg-header-clear ms-auto">Marks all as read</p>
                            </div>
                        </a>
                        <div class="header-notifications-list">
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify text-primary border">
                                        <span class="material-symbols-outlined">
                                            add_shopping_cart
                                        </span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">New Orders <span class="msg-time float-end">2 min
                                                ago</span></h6>
                                        <p class="msg-info">You have recived new orders</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify text-danger border">
                                        <span class="material-symbols-outlined">
                                            account_circle
                                        </span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">New Customers<span class="msg-time float-end">14 Sec
                                                ago</span></h6>
                                        <p class="msg-info">5 new user registered</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify text-success border">
                                        <span class="material-symbols-outlined">
                                            picture_as_pdf
                                        </span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">24 PDF File<span class="msg-time float-end">19 min
                                                ago</span></h6>
                                        <p class="msg-info">The pdf files generated</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify text-info border">
                                        <span class="material-symbols-outlined">
                                            store
                                        </span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">New Product Approved <span class="msg-time float-end">2
                                                hrs ago</span></h6>
                                        <p class="msg-info">Your new product has approved</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify text-warning border">
                                        <span class="material-symbols-outlined">
                                            event_available
                                        </span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">Time Response <span class="msg-time float-end">28 min
                                                ago</span></h6>
                                        <p class="msg-info">5.1 min avarage time response</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify text-danger border">
                                        <span class="material-symbols-outlined">
                                            forum
                                        </span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">New Comments <span class="msg-time float-end">4 hrs
                                                ago</span></h6>
                                        <p class="msg-info">New customer comments recived</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify text-primary border">
                                        <span class="material-symbols-outlined">
                                            local_florist
                                        </span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">New 24 authors<span class="msg-time float-end">1 day
                                                ago</span></h6>
                                        <p class="msg-info">24 new authors joined last week</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify text-success border">
                                        <span class="material-symbols-outlined">
                                            park
                                        </span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">Your item is shipped <span class="msg-time float-end">5
                                                hrs
                                                ago</span></h6>
                                        <p class="msg-info">Successfully shipped your item</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify text-warning border">
                                        <span class="material-symbols-outlined">
                                            elevation
                                        </span>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">Defense Alerts <span class="msg-time float-end">2 weeks
                                                ago</span></h6>
                                        <p class="msg-info">45% less alerts last 4 weeks</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <a href="javascript:;">
                            <div class="text-center msg-footer">View All</div>
                        </a>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="offcanvas" href="#ThemeCustomizer"><span
                            class="material-symbols-outlined">
                            settings
                        </span></a>
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
            <div class="logo-name flex-grow-1">
                <h5 class="mb-0">Roksyn</h5>
            </div>
            <div class="sidebar-close ">
                <span class="material-symbols-outlined">close</span>
            </div>
        </div>

        @include('layouts.sidebar') <!-- Create a partial for the sidebar -->
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

    <!-- Search Modal -->
    <div class="modal" id="exampleModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header gap-2">
                    <div class="position-relative popup-search w-100">
                        <input class="form-control form-control-lg ps-5 border border-3 border-primary" type="search"
                            placeholder="Search">
                        <span
                            class="material-symbols-outlined position-absolute ms-3 translate-middle-y start-0 top-50">search</span>
                    </div>
                    <button type="button" class="btn-close d-xl-none" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="search-list">
                        <p class="mb-1">Html Templates</p>
                        <div class="list-group">
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action active align-items-center d-flex gap-2"><i
                                    class="bi bi-filetype-html fs-5"></i>Best Html Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i
                                    class="bi bi-award fs-5"></i>Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i
                                    class="bi bi-box2-heart fs-5"></i>Responsive Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i
                                    class="bi bi-camera-video fs-5"></i>eCommerce Html Templates</a>
                        </div>
                        <p class="mb-1 mt-3">Web Designe Company</p>
                        <div class="list-group">
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i
                                    class="bi bi-chat-right-text fs-5"></i>Best Html Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i
                                    class="bi bi-cloud-arrow-down fs-5"></i>Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i
                                    class="bi bi-columns-gap fs-5"></i>Responsive Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i
                                    class="bi bi-collection-play fs-5"></i>eCommerce Html Templates</a>
                        </div>
                        <p class="mb-1 mt-3">Software Development</p>
                        <div class="list-group">
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i
                                    class="bi bi-cup-hot fs-5"></i>Best Html Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i
                                    class="bi bi-droplet fs-5"></i>Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i
                                    class="bi bi-exclamation-triangle fs-5"></i>Responsive Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i
                                    class="bi bi-eye fs-5"></i>eCommerce Html Templates</a>
                        </div>
                        <p class="mb-1 mt-3">Online Shoping Portals</p>
                        <div class="list-group">
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i
                                    class="bi bi-facebook fs-5"></i>Best Html Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i
                                    class="bi bi-flower2 fs-5"></i>Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i
                                    class="bi bi-geo-alt fs-5"></i>Responsive Html5 Templates</a>
                            <a href="javascript:;"
                                class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i
                                    class="bi bi-github fs-5"></i>eCommerce Html Templates</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--start theme customization-->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="ThemeCustomizer" aria-labelledby="ThemeCustomizerLable">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="ThemeCustomizerLable">Theme Customizer</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <h6 class="mb-0">Theme Variation</h6>
            <hr>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme"
                    value="option1">
                <label class="form-check-label" for="LightTheme">Light</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="DarkTheme"
                    value="option2" checked="">
                <label class="form-check-label" for="DarkTheme">Dark</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="SemiDarkTheme"
                    value="option3">
                <label class="form-check-label" for="SemiDarkTheme">Semi Dark</label>
            </div>
            <hr>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="MinimalTheme"
                    value="option3">
                <label class="form-check-label" for="MinimalTheme">Minimal Theme</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="ShadowTheme"
                    value="option4">
                <label class="form-check-label" for="ShadowTheme">Shadow Theme</label>
            </div>

        </div>
    </div>
    <!--end theme customization-->


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
    {{-- @livewireScripts
    @livewireChartsScripts --}}

</body>

</html>
