@extends('crudbooster::admin_template')
@section('content')
<!--begin::Portlet-->

<div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile" id="kt_page_portlet">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                <i class='{{CRUDBooster::getCurrentModule()->icon}}'></i> {{ $page_title }}
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            @if(CRUDBooster::getCurrentMethod() != 'getProfile' && $button_cancel)
                @if(g('return_url'))
                <a href="{{g("return_url")}}" title="Kembali" class="btn btn-clean kt-margin-r-10 nav_block">
                    <i class="la la-arrow-left"></i>
                    <span class="kt-hidden-mobile">
                        {{trans("crudbooster.form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name])}}
                    </span>
                </a>
                @else
                    <a href="{{CRUDBooster::mainpath()}}" title="Kembali" class="btn btn-clean kt-margin-r-10 nav_block">
                        <i class="la la-arrow-left"></i>
                        <span class="kt-hidden-mobile">
                            {{trans("crudbooster.form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name])}}
                        </span>
                    </a>
                @endif
            @endif

        </div>
    </div>
    <div class="kt-portlet__body">
            <div class="row">
                <div class="col-xl-3"></div>
                <div class="col-xl-6">
                    <div class="kt-section kt-section--first">
                        <div class="kt-section__body">
                             @php
                                $action = (@$row) ? CRUDBooster::mainpath("edit-save/$row->id") : CRUDBooster::mainpath("add-save");
                                $return_url = ($return_url) ?: g('return_url');
                            @endphp
                            <form class='form-horizontal' method='post' id="form" enctype="multipart/form-data" 
                                action='{{$action}}'>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type='hidden' name='return_url' value='{{ @$return_url }}'/>
                                <input type='hidden' name='ref_mainpath' value='{{ CRUDBooster::mainpath() }}'/>
                                <input type='hidden' name='ref_parameter' value='{{urldecode(http_build_query(@$_GET))}}'/>
                                @if($hide_form)
                                    <input type="hidden" name="hide_form" value='{!! serialize($hide_form) !!}'>
                                @endif
                                <div class="box-body" id="parent-form-area">

                                    @if($command == 'detail')
                                        @include("crudbooster::default.form_detail")
                                    @else
                                        @include("crudbooster::default.form_body")
                                    @endif
                                </div><!-- /.box-body -->
                                <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
                                <div class="form-group">
                                    <label class="control-label col-sm-2"></label>
                                    <div class="col-sm-10">
                                        {{-- @if($button_cancel && CRUDBooster::getCurrentMethod() != 'getDetail')
                                            @if(g('return_url'))
                                                <a href='{{g("return_url")}}' class='btn btn-warning btn-elevate btn-pill btn-elevate-air nav_block'>
                                                    <i class='fa fa-chevron-circle-left'></i> 
                                                    {{trans("crudbooster.button_back")}}
                                                </a>
                                            @else
                                                <a href='{{CRUDBooster::mainpath("?".http_build_query(@$_GET)) }}'
                                                    class='btn btn-default btn-elevate btn-pill btn-elevate-air nav_block'><i
                                                    class='fa fa-chevron-circle-left'></i> 
                                                    {{trans("crudbooster.button_back")}}
                                                </a>
                                            @endif
                                        @endif --}}
                                        @if(CRUDBooster::isCreate() || CRUDBooster::isUpdate())
                                            @if(CRUDBooster::isCreate() && $button_addmore==TRUE && $command == 'add')
                                                <input type="submit" name="submit" value='{{trans("crudbooster.button_save_more")}}' class='btn btn-brand btn-elevate btn-pill btn-elevate-air nav_block'>
                                            @endif
                                            @if($button_save && $command != 'detail')
                                                <input type="submit" name="submit" value='{{trans("crudbooster.button_save")}}' class='btn btn-success btn-elevate btn-pill btn-elevate-air nav_block'>
                                            @endif

                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
         
            </div>
    </div>
</div>
<!--end::Portlet-->




@endsection