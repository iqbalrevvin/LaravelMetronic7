@extends("crudbooster::admin_template")
@section("content")
    @push('head')
        <link href="{{ asset('metronic/css//pages/general/wizard/wizard-1.css') }} " rel="stylesheet" type="text/css" />
    @endpush
    @push('bottom')
        <script>
           var KTWizard1 = function () {
                // Base elements
                var wizardEl;
                var wizard;
                
                // Private functions
                var initWizard = function () {
                    // Initialize form wizard
                    wizard = new KTWizard('kt_wizard_v1', {
                        startStep: 4
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
        </script>
    @endpush

    <div class="kt-portlet">
        <div class="kt-portlet__body kt-portlet__body--fit">
            <div class="kt-grid  kt-wizard-v1 kt-wizard-v1--white" id="kt_wizard_v1" data-ktwizard-state="step-two">
                <div class="kt-grid__item">
                    <!--begin: Form Wizard Nav -->
                    @if($id)
                        <div class="kt-wizard-v1__nav">
                            <div class="kt-wizard-v1__nav-items">
                                <a class="kt-wizard-v1__nav-item nav_block" href="{{Route('ModulsControllerGetStep1',['id'=>$id])}}"  data-ktwizard-type="step" data-ktwizard-state="current">
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
                                    data-ktwizard-type="step" data-ktwizard-state="current">
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
                                <a class="kt-wizard-v1__nav-item" href="#" data-ktwizard-type="step">
                                    <div class="kt-wizard-v1__nav-body">
                                        <div class="kt-wizard-v1__nav-icon">
                                            <i class="flaticon-information"></i>
                                        </div>
                                        <div class="kt-wizard-v1__nav-label">
                                          Step 1 - Module Information
                                        </div>
                                    </div>
                                </a>
                                <a class="kt-wizard-v1__nav-item" href="#" data-ktwizard-type="step" 
                                    data-ktwizard-state="current">
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
                    <div class="box box-default">
                        <div class="box-header">
                            <h1 class="box-title">Configuration</h1>
                        </div>
                        <form method='post' action='{{Route('ModulsControllerPostStepFinish')}}'>
                            {{csrf_field()}}
                            <input type="hidden" name="id" value='{{$id}}'>
                            <div class="box-body">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Title Field Candidate</label>
                                            <input type="text" name="title_field" value="{{$cb_title_field}}" class='form-control'>
                                        </div>
                                    </div>

                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>Limit Data</label>
                                            <input type="number" name="limit" value="{{$cb_limit}}" class='form-control'>
                                        </div>
                                    </div>

                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <label>Order By</label>
                                            <?php
                                            if (is_array($cb_orderby)) {
                                                $orderby = [];
                                                foreach ($cb_orderby as $k => $v) {
                                                    $orderby[] = $k.','.$v;
                                                }
                                                $orderby = implode(";", $orderby);
                                            } else {
                                                $orderby = $cb_orderby;
                                            }
                                            ?>
                                            <input type="text" name="orderby" value="{{$orderby}}" class='form-control'>
                                            <div class="help-block">E.g : column_name,desc</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="row">

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Global Privilege</label>
                                                    <label class='radio-inline'>
                                                        <input type='radio' name='global_privilege' {{($cb_global_privilege)?"checked":""}} value='true'/> TRUE
                                                    </label>
                                                    <label class='radio-inline'>
                                                        <input {{(!$cb_global_privilege)?"checked":""}} type='radio' name='global_privilege' value='false'/> FALSE
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Show Button Table Action</label>
                                                    <label class='radio-inline'>
                                                        <input {{($cb_button_table_action)?"checked":""}} type='radio' name='button_table_action' value='true'/> TRUE
                                                    </label>
                                                    <label class='radio-inline'>
                                                        <input {{(!$cb_button_table_action)?"checked":""}} type='radio' name='button_table_action' value='false'/> FALSE
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Show Bulk Action Button</label>
                                                    <label class='radio-inline'>
                                                        <input {{($cb_button_bulk_action)?"checked":""}} type='radio' name='button_bulk_action' value='true'/> TRUE
                                                    </label>
                                                    <label class='radio-inline'>
                                                        <input {{(!$cb_button_bulk_action)?"checked":""}} type='radio' name='button_bulk_action' value='false'/> FALSE
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Button Action Style</label>
                                                    <label class='radio-inline'>
                                                        <input {{($cb_button_action_style=='button_icon')?"checked":""}} type='radio' name='button_action_style'
                                                               value='button_icon'/> Icon
                                                    </label>
                                                    <label class='radio-inline'>
                                                        <input {{($cb_button_action_style=='button_icon_text')?"checked":""}} type='radio' name='button_action_style'
                                                               value='button_icon_text'/> Icon & Text
                                                    </label>
                                                    <label class='radio-inline'>
                                                        <input {{($cb_button_action_style=='button_text')?"checked":""}} type='radio' name='button_action_style'
                                                               value='button_text'/> Button Text
                                                    </label>
                                                    <label class='radio-inline'>
                                                        <input {{($cb_button_action_style=='button_dropdown')?"checked":""}} type='radio' name='button_action_style'
                                                               value='button_dropdown'/> Dropdown
                                                    </label>
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="row">

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Show Button Add</label>
                                                    <label class='radio-inline'>
                                                        <input {{($cb_button_add)?"checked":""}} type='radio' name='button_add' value='true'/> TRUE
                                                    </label>
                                                    <label class='radio-inline'>
                                                        <input {{(!$cb_button_add)?"checked":""}} type='radio' name='button_add' value='false'/> FALSE
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Show Button Edit</label>
                                                    <label class='radio-inline'>
                                                        <input {{($cb_button_edit)?"checked":""}} type='radio' name='button_edit' value='true'/> TRUE
                                                    </label>
                                                    <label class='radio-inline'>
                                                        <input {{(!$cb_button_edit)?"checked":""}} type='radio' name='button_edit' value='false'/> FALSE
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Show Button Delete</label>
                                                    <label class='radio-inline'>
                                                        <input {{($cb_button_delete)?"checked":""}} type='radio' name='button_delete' value='true'/> TRUE
                                                    </label>
                                                    <label class='radio-inline'>
                                                        <input {{(!$cb_button_delete)?"checked":""}} type='radio' name='button_delete' value='false'/> FALSE
                                                    </label>
                                                </div>
                                            </div>


                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Show Button Detail</label>
                                                    <label class='radio-inline'>
                                                        <input {{($cb_button_detail)?"checked":""}} type='radio' name='button_detail' value='true'/> TRUE
                                                    </label>
                                                    <label class='radio-inline'>
                                                        <input {{(!$cb_button_detail)?"checked":""}} type='radio' name='button_detail' value='false'/> FALSE
                                                    </label>
                                                </div>
                                            </div>


                                        </div>


                                    </div>

                                    <div class="col-sm-4">
                                        <div class="row">

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Show Button Show Data</label>
                                                    <label class='radio-inline'>
                                                        <input {{($cb_button_show)?"checked":""}} type='radio' name='button_show' value='true'/> TRUE
                                                    </label>
                                                    <label class='radio-inline'>
                                                        <input {{(!$cb_button_show)?"checked":""}} type='radio' name='button_show' value='false'/> FALSE
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Show Button Filter & Sorting</label>
                                                    <label class='radio-inline'>
                                                        <input {{($cb_button_filter)?"checked":""}} type='radio' name='button_filter' value='true'/> TRUE
                                                    </label>
                                                    <label class='radio-inline'>
                                                        <input {{(!$cb_button_filter)?"checked":""}} type='radio' name='button_filter' value='false'/> FALSE
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Show Button Import</label>
                                                    <label class='radio-inline'>
                                                        <input {{($cb_button_import)?"checked":""}} type='radio' name='button_import' value='true'/> TRUE
                                                    </label>
                                                    <label class='radio-inline'>
                                                        <input {{(!$cb_button_import)?"checked":""}} type='radio' name='button_import' value='false'/> FALSE
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Show Button Export</label>
                                                    <label class='radio-inline'>
                                                        <input {{($cb_button_export)?"checked":""}} type='radio' name='button_export' value='true'/> TRUE
                                                    </label>
                                                    <label class='radio-inline'>
                                                        <input {{(!$cb_button_export)?"checked":""}} type='radio' name='button_export' value='false'/> FALSE
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="box-footer">
                                <div align="right">
                                    <button type="button" onclick="location.href='{{CRUDBooster::mainpath('step3').'/'.$id}}'" class="btn btn-default nav_block">&laquo; Back</button>
                                    <input type="submit" name="submit" class='btn btn-primary nav_block' value='Save Module'>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    


@endsection