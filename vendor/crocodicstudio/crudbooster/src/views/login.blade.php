<!DOCTYPE html>
<html lang="en">
    <!-- begin::Head -->
    <head>
        <!--begin::Base Path (base relative path for assets of this page) -->


        <!--end::Base Path -->
        <meta charset="utf-8" />
        <title>{{trans("crudbooster.page_title_login")}} : {{Session::get('appname')}}</title>
        <meta name="description" content="Login page example">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="apple-touch-icon" href="" />
        <link rel="apple-touch-startup-image" href="">
        <meta http-equiv="X-UA-Compatible"  content="IE=edge" />
        <meta property="og:url"             content="" />
        <meta property="og:type"            content="website"/>
        <meta property="og:title"           content="" />
        <meta property="og:description"     content=""/>
        <meta property="og:image"           content="">
        <meta http-equiv="X-UA-Compatible"  content="IE=edge" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="theme-color" content="##00FFFF">
        <meta name='generator' content='CRUDBooster'/>
        <meta name='robots' content='noindex,nofollow'/>
            <link rel="shortcut icon"
          href="{{ CRUDBooster::getSetting('favicon')?asset(CRUDBooster::getSetting('favicon')):asset('vendor/crudbooster/assets/logo_crudbooster.png') }}">
        <!--begin::Fonts -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
        <script>
            WebFont.load({
                google: {
                    "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
                },
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script>

        <!--end::Fonts -->

        <!--begin::Page Custom Styles(used by this page) -->
        <link href="{{ asset('metronic/css/pages/general/login/login-1.css') }} " rel="stylesheet" type="text/css" />
        <!--end::Page Custom Styles -->

        <!--begin:: Global Mandatory Vendors -->
        <link href="{{ asset('metronic/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css') }}" 
            rel="stylesheet" type="text/css" />
        <link href="{{ asset('metronic/vendors/general/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css" />
        <!--end:: Global Optional Vendors -->

        <!--begin::Global Theme Styles(used by all pages) -->
        <link href="{{ asset('metronic/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        <!--end::Global Theme Styles -->
{{-- 
        <!--begin::Layout Skins(used by all pages) -->
        <link href="./assets/css/demo1/skins/header/base/light.css" rel="stylesheet" type="text/css" />
        <link href="./assets/css/demo1/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
        <link href="./assets/css/demo1/skins/brand/dark.css" rel="stylesheet" type="text/css" />
        <link href="./assets/css/demo1/skins/aside/dark.css" rel="stylesheet" type="text/css" /> --}}
        <!--end::Layout Skins -->

    </head>

    <!-- end::Head -->

    <!-- begin::Body -->
    <body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

        <!-- begin:: Page -->
        <div class="kt-grid kt-grid--ver kt-grid--root">
            <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v1" id="kt_login">
                <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">

                    <!--begin::Aside-->
                    <div class="kt-grid__item kt-grid__item--order-tablet-and-mobile-2 kt-grid kt-grid--hor kt-login__aside" style="background-image: url({{ asset('metronic/media//bg/bg-4.jpg') }});">
                        <div class="kt-grid__item">
                            <a href="#" class="kt-login__logo">
                                <img src='{{ CRUDBooster::getSetting("logo")?asset(CRUDBooster::getSetting('logo')):asset('vendor/crudbooster/assets/logo_crudbooster.png') }}' 
                                style='max-width: 100%;max-height:170px'>
                            </a>
                        </div>
                        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver">
                            <div class="kt-grid__item kt-grid__item--middle">
                                <h3 class="kt-login__title">Welcome to CRUDBooster Metronic!</h3>
                                <h4 class="kt-login__subtitle">Sistem/Package CRUDBooster Modifikasi Dengan Template Metronic7.</h4>
                            </div>
                        </div>
                        <div class="kt-grid__item">
                            <div class="kt-login__info">
                                <div class="kt-login__copyright">
                                    &copy 2019 Metronic
                                </div>
                                <div class="kt-login__menu">
                                    <a href="#" class="kt-link">Privacy</a>
                                    <a href="#" class="kt-link">Legal</a>
                                    <a href="#" class="kt-link">Contact</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--begin::Aside-->

                    <!--begin::Content-->
                    <div class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">

                        <!--begin::Head-->
                       {{--  <div class="kt-login__head">
                            <span class="kt-login__signup-label">Don't have an account yet?</span>&nbsp;&nbsp;
                            <a href="#" class="kt-link kt-login__signup-link">Sign Up!</a>
                        </div> --}}
                        <!--end::Head-->

                        <!--begin::Body-->
                        <div class="kt-login__body">
                            <!--begin::Signin-->
                            <div class="kt-login__form">
                                <div class="kt-login__title">
                                    <h3>Login Akun</h3>
                                </div>

                                <!--begin::Form-->
                                @if ( Session::get('message') != '' )
                                    <div class='alert alert-danger'>
                                        {{ Session::get('message') }}
                                    </div>
                                @endif
                                <form class="kt-form" autocomplete='off' action="{{ route('postLogin') }}" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                                    <div class="form-group">
                                        <input class="form-control" autocomplete='off' type="text" name='email' placeholder="Email" require>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="password" placeholder="Password" name="password">
                                    </div>

                                    <!--begin::Action-->
                                    <div class="kt-login__actions">
                                        <a href="{{route("getForgot")}}" class="kt-link kt-login__link-forgot">
                                            Lupa Password ?
                                        </a>
                                        <button id="kt_login_signin_submit" class="btn btn-brand btn-elevate btn-elevate-air ">{{trans("crudbooster.button_sign_in")}}</button>
                                    </div>
                                    <!--end::Action-->
                                </form>

                                <!--end::Form-->

                                <!--begin::Divider-->
                                <div class="kt-login__divider">
                                    <div class="kt-divider">
                                        <span></span>
                                        <span>Login</span>
                                        <span></span>
                                    </div>
                                </div>

                                <!--end::Divider-->

                                <!--begin::Options-->
                                {{-- <div class="kt-login__options">
                                    <a href="#" class="btn btn-primary kt-btn">
                                        <i class="fab fa-facebook-f"></i>
                                        Facebook
                                    </a>
                                    <a href="#" class="btn btn-info kt-btn">
                                        <i class="fab fa-twitter"></i>
                                        Twitter
                                    </a>
                                    <a href="#" class="btn btn-danger kt-btn">
                                        <i class="fab fa-google"></i>
                                        Google
                                    </a>
                                </div> --}}

                                <!--end::Options-->
                            </div>

                            <!--end::Signin-->
                        </div>

                        <!--end::Body-->
                    </div>

                    <!--end::Content-->
                </div>
            </div>
        </div>

        <!-- end:: Page -->

        <!-- begin::Global Config(global config for global JS sciprts) -->
        <script>
            var KTAppOptions = {
                "colors": {
                    "state": {
                        "brand": "#5d78ff",
                        "dark": "#282a3c",
                        "light": "#ffffff",
                        "primary": "#5867dd",
                        "success": "#34bfa3",
                        "info": "#36a3f7",
                        "warning": "#ffb822",
                        "danger": "#fd3995"
                    },
                    "base": {
                        "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                        "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
                    }
                }
            };
        </script>

        <!-- end::Global Config -->

        <!--begin:: Global Mandatory Vendors -->
        <script src="{{ asset('metronic/vendors/general/jquery/dist/jquery.js') }}" type="text/javascript"></script>
        <script src="{{ asset('metronic/vendors/general/popper.js/dist/umd/popper.js') }}" type="text/javascript"></script>
        <script src="{{ asset('metronic/vendors/general/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('metronic/vendors/general/js-cookie/src/js.cookie.js') }}" type="text/javascript"></script>
        <!--end:: Global Mandatory Vendors -->

        <!--begin:: Global Optional Vendors -->
        <script src="{{ asset('metronic/vendors/general/block-ui/jquery.blockUI.js') }}" type="text/javascript"></script>
        <!--end:: Global Optional Vendors -->

        <!--begin::Global Theme Bundle(used by all pages) -->
        <script src="{{ asset('metronic/js/scripts.bundle.js') }}" type="text/javascript"></script>

        <!--end::Global Theme Bundle -->

        <!--begin::Page Scripts(used by this page) -->
   
        <!--end::Page Scripts -->
        <script>
            $('form').submit(function() {
                KTApp.block('.kt-form', {
                    overlayColor: '#000000',
                    type: 'v2',
                    state: 'success',
                    message: 'Mohon Tunggu, Sedang Memproses Login...'
                });
            });
            $('.kt-login__link-forgot').click(function() {
                KTApp.blockPage({
                    overlayColor: '#000000',
                    type: 'v2',
                    state: 'success',
                    message: 'Memuat Halaman Lupa Password...'
                });

                setTimeout(function() {
                    KTApp.unblockPage();
                }, 10000);
            });
        </script>
    </body>

    <!-- end::Body -->
</html>