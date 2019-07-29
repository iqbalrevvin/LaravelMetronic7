@extends("crudbooster::admin_template")
@section("content")

    @push('head')
        <link rel='stylesheet' href='<?php echo asset("vendor/crudbooster/assets/select2/dist/css/select2.min.css")?>'/>
        <link href="{{ asset('metronic/css//pages/general/wizard/wizard-1.css') }} " rel="stylesheet" type="text/css" />
        <style>
            .select2-container--default .select2-selection--single {
                border-radius: 0px !important
            }

            .select2-container .select2-selection--single {
                height: 35px
            }
        </style>
    @endpush

    @push('bottom')
        <script src='<?php echo asset("vendor/crudbooster/assets/select2/dist/js/select2.full.min.js")?>'></script>
        <script>
            var KTWizard1 = function () {
                // Base elements
                var wizardEl;
                var wizard;
                
                // Private functions
                var initWizard = function () {
                    // Initialize form wizard
                    wizard = new KTWizard('kt_wizard_v1', {
                        startStep: 1
                    });

                    // Validation before going to next page
                    wizard.on('beforeNext', function(wizardObj) {
                        if (validator.form() !== true) {
                            wizardObj.stop();  // don't go to the next step
                        }
                    })

                    // Change event
                    wizard.on('change', function(wizard) {
                        setTimeout(function() {
                            KTUtil.scrollTop(); 
                        }, 500);
                    });
                }   
                return {
                    // public functions
                    init: function() {
                        wizardEl = KTUtil.get('kt_wizard_v1');
                        formEl = $('#kt_form');
                        initWizard(); 

                    }
                };
            }();
            jQuery(document).ready(function() { 
                KTWizard1.init();
            });
            $(function () {
                $('.select2').select2();

            })
            $(function () {
                $('select[name=table]').change(function () {
                    var v = $(this).val().replace(".", "_");
                    $.get("{{CRUDBooster::mainpath('check-slug')}}/" + v, function (resp) {
                        if (resp.total == 0) {
                            $('input[name=path]').val(v);
                        } else {
                            v = v + resp.lastid;
                            $('input[name=path]').val(v);
                        }
                    })

                })
            })
        </script>
    @endpush
    <div class="kt-portlet">
        <div class="kt-portlet__body kt-portlet__body--fit">
            <div class="kt-grid  kt-wizard-v1 kt-wizard-v1--white" id="kt_wizard_v1" data-ktwizard-state="step-first">
                <div class="kt-grid__item">

                    <!--begin: Form Wizard Nav -->
                    @if($id)
                        <div class="kt-wizard-v1__nav">
                            <div class="kt-wizard-v1__nav-items">
                                <a class="kt-wizard-v1__nav-item nav_block" href="{{Route('ModulsControllerGetStep1',['id'=>$id])}}"  data-ktwizard-type="step" 
                                    data-ktwizard-state="current">
                                    <div class="kt-wizard-v1__nav-body">
                                        <div class="kt-wizard-v1__nav-icon">
                                            <i class="flaticon-information"></i>
                                        </div>
                                        <div class="kt-wizard-v1__nav-label">
                                          Step 1 - Module Information
                                        </div>
                                    </div>
                                </a>
                                <a class="kt-wizard-v1__nav-item nav_block" href="{{Route('ModulsControllerGetStep2',['id'=>$id])}}" 
                                    data-ktwizard-type="step">
                                    <div class="kt-wizard-v1__nav-body">
                                        <div class="kt-wizard-v1__nav-icon">
                                            <i class="flaticon-list-2"></i>
                                        </div>
                                        <div class="kt-wizard-v1__nav-label">
                                            Step 2 - Table Display
                                        </div>
                                    </div>
                                </a>
                                <a class="kt-wizard-v1__nav-item nav_block" href="{{Route('ModulsControllerGetStep3',['id'=>$id])}}"
                                    data-ktwizard-type="step">
                                    <div class="kt-wizard-v1__nav-body">
                                        <div class="kt-wizard-v1__nav-icon">
                                            <i class="flaticon-list-1"></i>
                                        </div>
                                        <div class="kt-wizard-v1__nav-label">
                                            Step 3 - Form Display
                                        </div>
                                    </div>
                                </a>
                                <a class="kt-wizard-v1__nav-item nav_block" href="{{Route('ModulsControllerGetStep4',['id'=>$id])}}"
                                    data-ktwizard-type="step">
                                    <div class="kt-wizard-v1__nav-body">
                                        <div class="kt-wizard-v1__nav-icon">
                                            <i class="flaticon-cogwheel"></i>
                                        </div>
                                        <div class="kt-wizard-v1__nav-label">
                                            Step 4 - Configuration
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="kt-wizard-v1__nav">
                            <div class="kt-wizard-v1__nav-items">
                                <a class="kt-wizard-v1__nav-item" href="" data-ktwizard-type="step" 
                                    data-ktwizard-state="current">
                                    <div class="kt-wizard-v1__nav-body">
                                        <div class="kt-wizard-v1__nav-icon">
                                            <i class="flaticon-information"></i>
                                        </div>
                                        <div class="kt-wizard-v1__nav-label">
                                          Step 1 - Module Information
                                        </div>
                                    </div>
                                </a>
                                <a class="kt-wizard-v1__nav-item" href="#" data-ktwizard-type="step">
                                    <div class="kt-wizard-v1__nav-body">
                                        <div class="kt-wizard-v1__nav-icon">
                                            <i class="flaticon-list-2"></i>
                                        </div>
                                        <div class="kt-wizard-v1__nav-label">
                                            Step 2 - Table Display
                                        </div>
                                    </div>
                                </a>
                                <a class="kt-wizard-v1__nav-item" href="#" data-ktwizard-type="step">
                                    <div class="kt-wizard-v1__nav-body">
                                        <div class="kt-wizard-v1__nav-icon">
                                            <i class="flaticon-list-1"></i>
                                        </div>
                                        <div class="kt-wizard-v1__nav-label">
                                            Step 3 - Form Display
                                        </div>
                                    </div>
                                </a>
                                <a class="kt-wizard-v1__nav-item" href="#" data-ktwizard-type="step">
                                    <div class="kt-wizard-v1__nav-body">
                                        <div class="kt-wizard-v1__nav-icon">
                                            <i class="flaticon-cogwheel"></i>
                                        </div>
                                        <div class="kt-wizard-v1__nav-label">
                                            Step 4 - Configuration
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endif

                    <!--end: Form Wizard Nav -->
                </div>
                <div class="kt-portlet__body">
                    <!--begin: Form Wizard Form-->
                    <div class="box box-default">
                        <div class="box-header with-border">
                            <h3 class="box-title">Module Information</h3>
                        </div>
                        <div class="box-body">
                            <form method="post" action="{{Route('ModulsControllerPostStep2')}}">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="id" value="{{$row->id}}">
                                <div class="form-group">
                                    <label for="">Table</label>
                                    <select name="table" id="table" required class="select2 form-control" value="{{$row->table_name}}">
                                        <option value="">{{trans('crudbooster.text_prefix_option')}} Table</option>
                                        @foreach($tables_list as $table)

                                            <option {{($table == $row->table_name)?"selected":""}} value="{{$table}}">{{$table}}</option>

                                        @endforeach
                                    </select>
                                    <div class="help-block">
                                        Do not use cms_* as prefix on your tables name
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Module Name</label>
                                    <input type="text" class="form-control" required name="name" value="{{$row->name}}">
                                </div>

                                <div class="form-group">
                                    <label for="">Icon</label>
                                    <select name="icon" id="icon" required class="select2 form-control">
                                        @foreach($fontawesome as $f)
                                            <option {{($row->icon == 'fa fa-'.$f)?"selected":""}} value="fa fa-{{$f}}">{{$f}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Module Slug</label>
                                    <input type="text" class="form-control" required name="path" value="{{$row->path}}">
                                    <div class="help-block">Please alpha numeric only, without space instead _ and or special character</div>
                                </div>
                        </div>
                        <div class="box-footer">

                            <input checked type='checkbox' name='create_menu' value='1'/> Also create menu for this module 
                            <a href='#' title='If you check this, we will create the menu for this module'>(?)</a>

                            <div class='pull-right'>
                                <a class='btn btn-default' href='{{Route("ModulsControllerGetIndex")}}'> {{trans('crudbooster.button_back')}}</a>
                                <input type="submit" class="btn btn-primary nav_block" value="Step 2 &raquo;">
                            </div>
                        </div>
                        </form>
                    </div>
                    <!--end: Form Wizard Form-->
                </div>
            </div>
        </div>
    </div>


    


@endsection
