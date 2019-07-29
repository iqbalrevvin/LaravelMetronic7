@extends('crudbooster::admin_template')

@section('content')

    <div class="row" style="width:750px;margin:0 auto ">
        
        <div class="kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile" id="kt_page_portlet">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        <i class='{{CRUDBooster::getCurrentModule()->icon}}'></i> {{ $page_title }}
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    @if(CRUDBooster::getCurrentMethod() != 'getProfile')
                        <span class="kt-hidden-mobile">
                            <a href='{{CRUDBooster::mainpath()}}' title="Kembali" class="btn btn-clean kt-margin-r-10 nav_block">
                                <i class="la la-arrow-left"></i>
                                <b>{{trans("crudbooster.form_back_to_list",['module'=>CRUDBooster::getCurrentModule()->name])}}</b>
                            </a>
                        </span>
                    @endif
                </div>
            </div>
            <form class="kt-form" method='post' action='{{ (@$row->id)?route("PrivilegesControllerPostEditSave")."/$row->id":route("PrivilegesControllerPostAddSave") }}'>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="kt-portlet__body">
                    <div class="alert alert-info">
                        <strong>Note:</strong> To show the menu you have to create a menu at Menu Management
                    </div>
                    <div class='form-group'>
                        <label>{{trans('crudbooster.privileges_name')}}</label>
                        <input type='text' class='form-control' name='name' required value='{{ @$row->name }}'/>
                        <div class="text-danger">{{ $errors->first('name') }}</div>
                    </div>

                    <div class='form-group'>
                        <label>{{trans('crudbooster.set_as_superadmin')}}</label>
                        <div id='set_as_superadmin' class='radio'>
                            <label><input required {{ (@$row->is_superadmin==1)?'checked':'' }} type='radio' name='is_superadmin'
                                          value='1'/> {{trans('crudbooster.confirmation_yes')}}</label> &nbsp;&nbsp;
                            <label><input {{ (@$row->is_superadmin==0)?'checked':'' }} type='radio' name='is_superadmin'
                                          value='0'/> {{trans('crudbooster.confirmation_no')}}</label>
                        </div>
                        <div class="text-danger">{{ $errors->first('is_superadmin') }}</div>
                    </div>


                    <div id='privileges_configuration' class='form-group'>
                        <label>{{trans('crudbooster.privileges_configuration')}}</label>
                        @push('bottom')
                            <script>
                                $(function () {
                                    $("#is_visible").click(function () {
                                        var is_ch = $(this).prop('checked');
                                        console.log('is checked create ' + is_ch);
                                        $(".is_visible").prop("checked", is_ch);
                                        console.log('Create all');
                                    })
                                    $("#is_create").click(function () {
                                        var is_ch = $(this).prop('checked');
                                        console.log('is checked create ' + is_ch);
                                        $(".is_create").prop("checked", is_ch);
                                        console.log('Create all');
                                    })
                                    $("#is_read").click(function () {
                                        var is_ch = $(this).is(':checked');
                                        $(".is_read").prop("checked", is_ch);
                                    })
                                    $("#is_edit").click(function () {
                                        var is_ch = $(this).is(':checked');
                                        $(".is_edit").prop("checked", is_ch);
                                    })
                                    $("#is_delete").click(function () {
                                        var is_ch = $(this).is(':checked');
                                        $(".is_delete").prop("checked", is_ch);
                                    })
                                    $(".select_horizontal").click(function () {
                                        var p = $(this).parents('tr');
                                        var is_ch = $(this).is(':checked');
                                        p.find("input[type=checkbox]").prop("checked", is_ch);
                                    })
                                })
                            </script>
                        @endpush
                        <table class='table table-striped table-hover table-bordered'>
                            <thead>
                            <tr class='active'>
                                <th width='3%'>{{trans('crudbooster.privileges_module_list_no')}}</th>
                                <th width='60%'>{{trans('crudbooster.privileges_module_list_mod_names')}}</th>
                                <th>&nbsp;</th>
                                <th>{{trans('crudbooster.privileges_module_list_view')}}</th>
                                <th>{{trans('crudbooster.privileges_module_list_create')}}</th>
                                <th>{{trans('crudbooster.privileges_module_list_read')}}</th>
                                <th>{{trans('crudbooster.privileges_module_list_update')}}</th>
                                <th>{{trans('crudbooster.privileges_module_list_delete')}}</th>
                            </tr>
                            <tr class='info'>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <td align="center">
                                    <label class="kt-checkbox kt-checkbox--brand">
                                        <input type='checkbox' id='is_visible'/>
                                        <span></span>
                                    </label>
                                </td>
                                <td align="center">
                                    <label class="kt-checkbox kt-checkbox--success">
                                        <input type='checkbox' id='is_create'/>
                                        <span></span>
                                    </label>
                                </td>
                                <td align="center">
                                    <label class="kt-checkbox kt-checkbox--primary">
                                        <input type='checkbox' id='is_read'/>
                                        <span></span>
                                    </label>
                                </td>
                                <td align="center">
                                    <label class="kt-checkbox kt-checkbox--warning">
                                        <input type='checkbox' id='is_edit'/>
                                        <span></span>
                                    </label>
                                </td>
                                <td align="center">
                                    <label class="kt-checkbox kt-checkbox--danger">
                                        <input type='checkbox' id='is_delete'/>
                                        <span></span>
                                    </label>
                                </td>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1;?>
                            @foreach($moduls as $modul)
                                <?php
                                $roles = DB::table('cms_privileges_roles')->where('id_cms_moduls', $modul->id)->where('id_cms_privileges', $row->id)->first();
                                ?>
                                <tr>
                                    <td><?php echo $no++;?></td>
                                    <td>{{$modul->name}}</td>
                                    <td class='info' align="center">
                                        <label class="kt-checkbox kt-checkbox--dark">
                                            <input type='checkbox' title='Check All Horizontal' <?=($roles->is_create && $roles->is_read && $roles->is_edit && $roles->is_delete) ? "checked" : ""?> class='select_horizontal'/>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td class='active' align="center">
                                        <label class="kt-checkbox kt-checkbox--brand">
                                            <input type='checkbox' class='is_visible' name='privileges[<?=$modul->id?>][is_visible]'
                                            <?=@$roles->is_visible ? "checked" : ""?> value='1'/>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td class='warning' align="center">
                                        <label class="kt-checkbox kt-checkbox--success">
                                            <input type='checkbox' class='is_create' name='privileges[<?=$modul->id?>][is_create]'<?=@$roles->is_create ? "checked" : ""?> value='1'/>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td class='info' align="center">
                                        <label class="kt-checkbox kt-checkbox--primary">
                                            <input type='checkbox' class='is_read' name='privileges[<?=$modul->id?>][is_read]' <?=@$roles->is_read ? "checked" : ""?> value='1'/>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td class='success' align="center">
                                        <label class="kt-checkbox kt-checkbox--warning">
                                            <input type='checkbox' class='is_edit' name='privileges[<?=$modul->id?>][is_edit]' <?=@$roles->is_edit ? "checked" : ""?> value='1'/>
                                            <span></span>
                                        </label>                                           
                                    </td>
                                    <td class='danger' align="center">
                                        <label class="kt-checkbox kt-checkbox--danger">
                                            <input type='checkbox' class='is_delete' name='privileges[<?=$modul->id?>][is_delete]' <?=@$roles->is_delete ? "checked" : ""?> value='1'/>
                                            <span></span>
                                        </label>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- /.box-body -->
                <div class="form-group" align="right">
                <label class="control-label col-sm-2"></label>
                    <div class="col-sm-10">
                        <button type='button' onclick="location.href='{{CRUDBooster::mainpath()}}'"
                                class='btn btn-default'>{{trans("crudbooster.button_cancel")}}</button>
                        <button type='submit' class='btn btn-primary'><i class='fa fa-save'></i> {{trans("crudbooster.button_save")}}</button>
                    </div><!-- /.box-footer-->
                </div>
                <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>
            </form>
        </div>
    </div><!-- /.row -->
@endsection
