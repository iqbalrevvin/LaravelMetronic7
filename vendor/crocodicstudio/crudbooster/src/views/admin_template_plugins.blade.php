<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

<!-- REQUIRED JS SCRIPTS -->

<script src="{{ asset('metronic/vendors/general/block-ui/jquery.blockUI.js') }}" type="text/javascript"></script>
<script src="{{ asset('metronic/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('metronic/vendors/custom/js/vendors/bootstrap-datepicker.init.js') }}" type="text/javascript"></script>
<script src="{{ asset('metronic/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('metronic/vendors/general/bootstrap-daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('metronic/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('metronic/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js') }}" type="text/javascript"></script>
<script src="{{ asset('metronic/vendors/general/bootstrap-select/dist/js/bootstrap-select.js') }}" type="text/javascript"></script>
<script src="{{ asset('metronic/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js') }}" type="text/javascript"></script>
<script src="{{ asset('metronic/vendors/general/select2/dist/js/select2.full.js') }}" type="text/javascript"></script>
<script src="{{ asset('metronic/vendors/general/typeahead.js/dist/typeahead.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('metronic/vendors/general/handlebars/dist/handlebars.js') }}" type="text/javascript"></script>
<script src="{{ asset('metronic/vendors/general/inputmask/dist/jquery.inputmask.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('metronic/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js') }}" type="text/javascript"></script>
<script src="{{ asset('metronic/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js') }}" type="text/javascript"></script>
<script src="{{ asset('metronic/vendors/general/owl.carousel/dist/owl.carousel.js') }}" type="text/javascript"></script>
<script src="{{ asset('metronic/vendors/general/autosize/dist/autosize.js') }}" type="text/javascript"></script>
<script src="{{ asset('metronic/vendors/general/clipboard/dist/clipboard.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('metronic/vendors/general/dropzone/dist/dropzone.js') }}" type="text/javascript"></script>
<script src="{{ asset('metronic/vendors/general/summernote/dist/summernote.js') }}" type="text/javascript"></script>
<script src="{{ asset('metronic/vendors/general/bootstrap-notify/bootstrap-notify.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('metronic/vendors/custom/js/vendors/bootstrap-notify.init.js') }}" type="text/javascript"></script>
<script src="{{ asset('metronic/vendors/general/jquery-validation/dist/jquery.validate.js') }}" type="text/javascript"></script>
<script src="{{ asset('metronic/vendors/general/jquery-validation/dist/additional-methods.js') }}" type="text/javascript"></script>
<script src="{{ asset('metronic/vendors/custom/js/vendors/jquery-validation.init.js') }} " type="text/javascript"></script>
<script src="{{ asset('metronic/vendors/general/toastr/build/toastr.min.js') }} " type="text/javascript"></script>
<script src="{{ asset('metronic/vendors/general/morris.js/morris.js') }} " type="text/javascript"></script>
<script src="{{ asset('metronic/vendors/general/chart.js/dist/Chart.bundle.js') }} " type="text/javascript"></script>
<script src="{{ asset('metronic/vendors/general/dompurify/dist/purify.js') }}" type="text/javascript"></script>
<script src="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset ('vendor/crudbooster/assets/adminlte/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
<!--SWEET ALERT-->
<script src="{{asset('vendor/crudbooster/assets/sweetalert/dist/sweetalert.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('vendor/crudbooster/assets/sweetalert/dist/sweetalert.css')}}">
<link href="{{ asset('metronic/vendors/general/sweetalert2/dist/sweetalert2.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ asset('metronic/vendors/general/sweetalert2/dist/sweetalert2.min.js')}}" type="text/javascript"></script>

<script>
    var ASSET_URL = "{{asset('/')}}";
    var APP_NAME = "{{Session::get('appname')}}";
    var ADMIN_PATH = '{{url(config("crudbooster.ADMIN_PATH")) }}';
    var NOTIFICATION_JSON = "{{route('NotificationsControllerGetLatestJson')}}";
    var NOTIFICATION_INDEX = "{{route('NotificationsControllerGetIndex')}}";

    var NOTIFICATION_YOU_HAVE = "{{trans('crudbooster.notification_you_have')}}";
    var NOTIFICATION_NOTIFICATIONS = "{{trans('crudbooster.notification_notification')}}";
    var NOTIFICATION_NEW = "{{trans('crudbooster.notification_new')}}";
    $(function () {
        $('.datatables-simple').DataTable();
    })
</script>
<script src="{{asset('vendor/crudbooster/assets/js/main.js').'?r='.time()}}"></script>

	
