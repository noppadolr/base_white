<!DOCTYPE html>
<!--
Template Name: NobleUI - HTML Bootstrap 5 Admin Dashboard Template
Author: NobleUI
Website: https://www.nobleui.com
Portfolio: https://themeforest.net/user/nobleui/portfolio
Contact: nobleui123@gmail.com
Purchase: https://1.envato.market/nobleui_admin
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="NobleUI">
    <meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <title>NobleUI - HTML Bootstrap 5 Admin Dashboard Template</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/core/core.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/sweetalert2/sweetalert2.min.css') }}">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('admin/assets/fonts/feather-font/css/iconfont.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('admin/assets/css/demo1/style.css')}}">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.png')}}" />
    <style>
        *{
            font-family: "Sarabun", sans-serif;
        }
        /*#usernameInput:focus {*/
        /*    !*outline-color: red;*!*/
        /*    !*border-width: thick;*!*/
        /*    border-color: #ffb700;*/
        /*}*/
        .form-control:focus {
            border: 2px solid #ffb700;
            border-radius: 10px;

        }
        /*input[type=password]:focus {*/
        /*    border: 6px solid #ffb700;*/
        /*    border-radius: 4px;*/
        /*}*/

    </style>
</head>
<body>
<div class="main-wrapper">
    <div class="page-wrapper full-page">
        <div class="page-content d-flex align-items-center justify-content-center">

            <div class="row w-100 mx-0 auth-page">
                <div class="col-md-8 col-xl-6 mx-auto">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-4 pe-md-0">
                                <div class="auth-side-wrapper" style="width: 100%;
                                        height: 100%;
                                        background-image: url({{ asset('upload/login.png')  }});">

                                </div>
                            </div>
                            <div class="col-md-8 ps-md-0">
                                <div class="auth-form-wrapper px-4 py-5">
                                    <a href="#" class="noble-ui-logo d-block mb-2">Noble<span>UI</span></a>
                                    <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>

                                    @if (Session::has('e1'))
                                        <div class="alert alert-danger">{{ Session::get('e1') }}</div>
                                    @endif

                                    <form class="forms-sample" method="POST" action="{{route('admin.auth')}}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text"
                                                   class="form-control @error('username') is-invalid @enderror"
                                                   id="username"
                                                    name="username"
                                            value="admin">
                                            @error('username')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="userPassword" class="form-label">Password</label>
                                            <input type="password"
                                                   class="form-control @error('username') is-invalid @enderror @error('password') is-invalid @enderror"
                                                   id="userPassword"
                                                   name="password"
                                                   autocomplete="current-password"
                                                   value="111"
                                            >
                                            @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-check mb-3">
                                            <input type="checkbox"
                                                   class="form-check-input"
                                                   id="authCheck">
                                            <label class="form-check-label" for="authCheck">
                                                Remember me
                                            </label>
                                        </div>
                                        <div>

                                            <button type="submit" class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                                                <i class="btn-icon-prepend" data-feather="log-in"></i>
                                                Login
                                            </button>
                                        </div>
                                        <a href="" class="d-block mt-3 text-muted">Not a user? Sign up</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- core:js -->
<script src="{{asset('admin/assets/vendors/core/core.js')}}"></script>
<script src="{{ asset('admin/assets/vendors/sweetalert2/sweetalert2.min.js') }}"></script>

<!-- Plugin js for this page -->
<!-- End plugin js for this page -->

<!-- inject:js -->
<script src="{{asset('admin/assets/vendors/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('admin/assets/js/template.js')}}"></script>
<script src="{{ asset('admin/assets/js/sweet-alert.js') }}"></script>
<script type="text/javascript">
    @if(Session::has('e1'))
    $(document).ready( function () {
        console.log('e1');
        Swal.fire({
            icon: 'error',
            title: 'ชื่อผู้ใช้งานหรือหรัสผ่านไม่ถูกต้อง!',
            text: '',
            timer:2500,
            // footer: '<a href="">Why do I have this issue?</a>'
        })
    });

        @elseif(Session::has('logout'))
        $(document).ready( function () {
            showSwal('logout');
        });

    @endif
</script>
</script>
</body>
</html>
