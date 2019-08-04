<!DOCTYPE html>

<html lang="id">
    <!-- begin::Head -->
    <head>
        <!--begin::Base Path (base relative path for assets of this page) -->
  {{--       <base href="/"> --}}
        <!--end::Base Path -->
        <meta charset="utf-8" />
        <title>{{ ($page_title)?Session::get('appname').': '.strip_tags($page_title):"Admin Area" }}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}"/>
        <meta name="description" content="Latest updates and statistic charts">
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

        <link rel="shortcut icon"
          href="{{ CRUDBooster::getSetting('favicon')?asset(CRUDBooster::getSetting('favicon')):asset('vendor/crudbooster/assets/logo_crudbooster.png') }} ">
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
        <!--begin::Page Vendors Styles(used by this page) -->
        {{-- <link href="{{ asset('metronic/vendors/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" /> --}}
        <!--end::Page Vendors Styles -->
        <!--begin:: Global Mandatory Vendors -->
        <link href="{{ asset('metronic/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" type="text/css" />
        <!--end:: Global Mandatory Vendors -->
        <!--begin:: Global Optional Vendors -->
        <link href="{{ asset('metronic/vendors/general/tether/dist/css/tether.css') }} " rel="stylesheet" type="text/css" />
        <link href="{{ asset('metronic/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css') }} " rel="stylesheet" type="text/css" />
        <link href="{{ asset('metronic/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css') }} " rel="stylesheet" type="text/css" />
        <link href="{{ asset('metronic/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css') }} " rel="stylesheet" type="text/css" />
        <link href="{{ asset('metronic/vendors/general/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('metronic/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('metronic/vendors/general/bootstrap-select/dist/css/bootstrap-select.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('metronic/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('metronic/vendors/general/select2/dist/css/select2.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('metronic/vendors/general/ion-rangeslider/css/ion.rangeSlider.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('metronic/vendors/general/nouislider/distribute/nouislider.css') }}" rel="stylesheet" type="text/css" />
{{--         <link href="{{ asset('metronic/vendors/general/owl.carousel/dist/assets/owl.carousel.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('metronic/vendors/general/owl.carousel/dist/assets/owl.theme.default.css') }}" rel="stylesheet" type="text/css" /> --}}
        <link href="{{ asset('metronic/vendors/general/dropzone/dist/dropzone.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('metronic/vendors/general/summernote/dist/summernote.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('metronic/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('metronic/vendors/general/animate.css/animate.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('metronic/vendors/general/toastr/build/toastr.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('metronic/vendors/general/morris.js/morris.css') }}" rel="stylesheet" type="text/css" />
        
        <link href="{{ asset('metronic/vendors/general/socicon/css/socicon.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('metronic/vendors/custom/vendors/line-awesome/css/line-awesome.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('metronic/vendors/custom/vendors/flaticon/flaticon.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('metronic/vendors/custom/vendors/flaticon2/flaticon.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('metronic/vendors/general/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css" />
        <!--end:: Global Optional Vendors -->

        <!--begin::Global Theme Styles(used by all pages) -->
        <link href="{{ asset("metronic/css/style.bundle.css") }}" rel="stylesheet" type="text/css" />
        <link rel='stylesheet' href='{{asset("vendor/crudbooster/assets/css/main.css").'?r='.time()}}'/>
        <!--end::Global Theme Styles -->

        <!--begin::Layout Skins(used by all pages) -->

        <!--end::Layout Skins -->
        <style type="text/css">
            @if($style_css)
                {!! $style_css !!}
            @endif
        </style>
        @if($load_css)
            @foreach($load_css as $css)
                <link href="{{$css}}" rel="stylesheet" type="text/css"/>
            @endforeach
        @endif

        <style type="text/css">
            .dropdown-menu-action {
                left: -130%;
            }

            .btn-group-action .btn-action {
                cursor: default
            }

            #box-header-module {
                box-shadow: 10px 10px 10px #dddddd;
            }

            .sub-module-tab li {
                background: #F9F9F9;
                cursor: pointer;
            }

            .sub-module-tab li.active {
                background: #ffffff;
                box-shadow: 0px -5px 10px #cccccc
            }

            .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover {
                border: none;
            }

            .nav-tabs > li > a {
                border: none;
            }

            .breadcrumb {
                margin: 0 0 0 0;
                padding: 0 0 0 0;
            }

            .form-group > label:first-child {
                display: block
            }
        </style>

        @stack('head')

    </head>
    <!-- end::Head -->

    <!-- begin::Body -->
    <body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-aside--minimize kt-page--loading">

        <!-- begin:: Header Mobile -->
        @include('crudbooster::layouts.partials._menu_header_mobile')
        <!-- end:: Header Mobile -->

        <!--CONTENT-->
        <div class="kt-grid kt-grid--hor kt-grid--root">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
                <!-- begin:: Aside -->
                @include('crudbooster::layouts.partials._sidebar')
                <!-- end:: Aside -->
                <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
                    <!-- begin:: Header -->
                    @include('crudbooster::layouts.partials._menu_header')
                    <!-- end:: Header -->
                    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
                    <!-- begin:: Subheader -->
                        @include('crudbooster::layouts.partials._subheader')
                        <!-- end:: Subheader -->
                        <div class="kt-content kt-grid__item kt-grid__item--fluid" id="kt_content">
                        @if(@$alerts)
                            @foreach(@$alerts as $alert)
                                <div class='callout callout-{{$alert["type"]}}'>
                                    {!! $alert['message'] !!}
                                </div>
                            @endforeach
                        @endif


                        @if (Session::get('message')!='')
                            <div class='alert alert-{{ Session::get("message_type") }} fade show' role="alert">
                                <h4>
                                    <i class="icon fa fa-info"></i> 
                                    {{ trans("crudbooster.alert_".Session::get("message_type")) }}
                                </h4>
                                &nbsp;&nbsp;
                                <div class="alert-text">{!!Session::get('message')!!}</div>
                                <div class="alert-close">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true"><i class="la la-close"></i></span>
                                    </button>
                                </div>
                            </div>
                        @endif

                        @yield('content')
                        </div>
                    </div>
                    <!-- begin:: Footer -->
                    @include('crudbooster::layouts.partials._footer')
                    <!-- end:: Footer -->
                </div>
            </div>
        </div>
        <!--END CONTENT-->
        <!-- begin::Quick Panel -->
        @include('crudbooster::layouts.partials2._quick_panel')
        <!-- end::Quick Panel -->

        <!-- begin::Scrolltop -->
        <div id="kt_scrolltop" class="kt-scrolltop">
            <i class="fa fa-arrow-up"></i>
        </div>
        <!-- end::Scrolltop -->

        <!-- begin::Sticky Toolbar -->
        {{-- @include('crudbooster::layouts.partials2._sticky_toolbar') --}}
        <!-- end::Sticky Toolbar -->

        <!--Begin:: Chat-->
        {{-- @include('crudbooster::layouts.partials2._modal_chat') --}}
        <!--ENd:: Chat-->

        <script>
            var KTAppOptions = {
                "colors": {
                    "state": {
                        "brand": "#22b9ff",
                        "light": "#ffffff",
                        "dark": "#282a3c",
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
        <script src="{{ asset('metronic/vendors/general/moment/min/moment.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('metronic/vendors/general/tooltip.js/dist/umd/tooltip.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('metronic/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js') }}" type="text/javascript"></script>
        <script src="{{ asset('metronic/vendors/general/sticky-js/dist/sticky.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('metronic/vendors/general/wnumb/wNumb.js') }}" type="text/javascript"></script>
        <!--end:: Global Mandatory Vendors -->

        <!--begin:: Global Optional Vendors -->
        @yield('script_vendor_optional')
        @include('crudbooster::admin_template_plugins')
       
        <!--end:: Global Optional Vendors -->

        <!--begin::Global Theme Bundle(used by all pages) -->
        <script src="{{ asset('metronic/js/scripts.bundle.js') }} " type="text/javascript"></script>
        <!--end::Global Theme Bundle -->

        <!--begin::Page Vendors(used by this page) -->

        <!--end::Page Vendors -->

        <!--begin::Page Scripts(used by this page) -->
        <script src="{{ asset('metronic/js/pages/dashboard.js') }}" type="text/javascript"></script>
        <!--end::Page Scripts -->
        @if($load_js)
            @foreach($load_js as $js)
                <script src="{{$js}}"></script>
            @endforeach
        @endif
        <script type="text/javascript">
            var site_url = "{{url('/')}}";
            @if($script_js)
                {!! $script_js !!}
            @endif
        </script>
        <script>
            $('.nav_block').click(function() {
                KTApp.blockPage({
                    overlayColor: '#000000',
                    type: 'v2',
                    state: 'success',
                    message: 'Mohon Tunggu...'
                });

                setTimeout(function() {
                    KTApp.unblockPage();
                }, 10000);
            });
        </script>
        @stack('bottom')
    </body>
    <!-- end::Body -->
</html>