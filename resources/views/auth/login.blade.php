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
    <!--Styles-->
    <link href="{{ asset('roksyn/ltr/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('roksyn/ltr/assets/css/icons.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="{{ asset('roksyn/ltr/assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('roksyn/ltr/assets/css/dark-theme.css') }}" rel="stylesheet">
    @vite([])

</head>

<body>


    <!--authentication-->

    <div class="mx-3 mx-lg-0">

        <div class="card my-5 col-xl-9 col-xxl-8 mx-auto rounded-4 overflow-hidden border-3 p-3">
            <div class="row g-3">
                <div class="col-lg-6 d-flex">
                    <div class="card-body p-5 w-100">
                        <div class="d-flex align-items-center mb-5">
                            <img src="{{ asset('logo.png') }}" width="50" alt="" class="me-1">
                            <img src="{{ asset('dishub.png') }}" width="50" alt="" class="me-3">
                            <div>
                                <h4 class="fw-bold mb-0">SIPAWON</h4>
                                <span class="text-muted">Sistem Pelayanan Angkutan Wonosobo</span>
                            </div>
                        </div>

                        <h4 class="fw-bold mb-1">Login</h4>
                        <p class="mb-4">Enter your credentials to login your account</p>

                        <div class="form-body">
                            <form action="{{ route('login') }}" method="post" class="row g-3">
                                @csrf

                                <x-validation-errors class="mb-4" />

                                @if (session('status'))
                                    <div class="mb-4 text-sm font-medium text-green-600">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <div class="col-12">
                                    <label for="inputEmailAddress" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="inputEmailAddress"
                                        placeholder="jhon@example.com">
                                </div>
                                <div class="col-12">
                                    <label for="inputChoosePassword" class="form-label">Password</label>
                                    <div class="input-group" id="show_hide_password">
                                        <input type="password" name="password" class="form-control border-end-0"
                                            id="inputChoosePassword" placeholder="Enter Password">
                                        <a href="javascript:;" class="input-group-text bg-transparent"><i
                                                class="bi bi-eye-slash-fill"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                                        <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                                    </div>
                                </div>
                                <div class="col-md-6 text-end">
                                    <a href="#">Forgot Password ?</a>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-lg-flex d-none">
                    <div
                        class="p-3 rounded-4 w-100 d-flex align-items-center justify-content-center border-3 bg-primary">
                        <img src="{{ asset('roksyn/ltr/assets/images/boxed-login.png') }}" class="img-fluid"
                            alt="">
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--authentication-->

    <!--plugins-->
    <script src="{{ asset('roksyn/ltr/assets/js/jquery.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bi-eye-slash-fill");
                    $('#show_hide_password i').removeClass("bi-eye-fill");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bi-eye-slash-fill");
                    $('#show_hide_password i').addClass("bi-eye-fill");
                }
            });
        });
    </script>

</body>

</html>
