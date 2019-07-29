@extends('crudbooster::admin_template')

@section('content')

    @if($index_statistic)
        <div id='box-statistic' class='row'>
            @foreach($index_statistic as $stat)
                <div class="{{ ($stat['width'])?:'col-sm-3' }}">
                    <div class="small-box bg-{{ $stat['color']?:'red' }}">
                        <div class="inner">
                            <h3>{{ $stat['count'] }}</h3>
                            <p>{{ $stat['label'] }}</p>
                        </div>
                        <div class="icon">
                            <i class="{{ $stat['icon'] }}"></i>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    @if(!is_null($pre_index_html) && !empty($pre_index_html))
        {!! $pre_index_html !!}
    @endif


    @if(g('return_url'))
        <p>
            <a href='{{g("return_url")}}'>
                <i class='fa fa-chevron-circle-{{ trans('crudbooster.left') }}'></i>
                &nbsp; {{trans('crudbooster.form_back_to_list',['module'=>urldecode(g('label'))])}}
            </a>
        </p>
    @endif

    @if($parent_table)
        <div class="box box-default">
            <div class="box-body table-responsive no-padding">
                <table class='table table-bordered'>
                    <tbody>
                    <tr class='active'>
                        <td colspan="2"><strong><i class='fa fa-bars'></i> {{ ucwords(urldecode(g('label'))) }}</strong></td>
                    </tr>
                    @foreach(explode(',',urldecode(g('parent_columns'))) as $c)
                        <tr>
                            <td width="25%"><strong>
                                    @if(urldecode(g('parent_columns_alias')))
                                        {{explode(',',urldecode(g('parent_columns_alias')))[$loop->index]}}
                                    @else
                                        {{  ucwords(str_replace('_',' ',$c)) }}
                                    @endif
                                </strong></td>
                            <td> {{ $parent_table->$c }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
            <form method='get' id='form-limit-paging' style="display:inline-block" action='{{Request::url()}}'>
                    {!! CRUDBooster::getUrlParameters(['limit']) !!}
                    <div class="input-group">
                        <select onchange="$('#form-limit-paging').submit()" name='limit' style="width: 75px;" class='form-control'>
                            <option {{($limit==5)?'selected':''}} value='5'>5</option>
                            <option {{($limit==10)?'selected':''}} value='10'>10</option>
                            <option {{($limit==20)?'selected':''}} value='20'>20</option>
                            <option {{($limit==25)?'selected':''}} value='25'>25</option>
                            <option {{($limit==50)?'selected':''}} value='50'>50</option>
                            <option {{($limit==100)?'selected':''}} value='100'>100</option>
                            <option {{($limit==200)?'selected':''}} value='200'>200</option>
                        </select>
                    </div>
            </form>
            @if($button_bulk_action && ( ($button_delete && CRUDBooster::isDelete()) || $button_selected) )
                <div class="dropdown dropdown-inline">
                    <button type="button" class="btn btn-default btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="flaticon-delete-1"></i>
                    </button>
                    <div class="selected-action dropdown-menu dropdown-menu-right">
                        <ul class="kt-nav">
                            <li class="kt-nav__section kt-nav__section--first">
                                <span class="kt-nav__section-text">Pilih Tindakan</span>
                            </li>
                            @if($button_selected)
                                @foreach($button_selected as $button)
                                    <li class="kt-nav__item">
                                        <a href="javascript:void(0)" 
                                            data-name='{{$button["name"]}}' 
                                            title='{{$button["label"]}}'>
                                            <i class="kt-nav__link-icon fa fa-{{$button['icon']}}"></i> 
                                            <span class="kt-nav__link-text">
                                                {{$button['label']}}
                                            </span>
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                            @if($button_delete && CRUDBooster::isDelete())
                                <li class="kt-nav__item">
                                    <a href="javascript:void(0)" data-name='delete' 
                                        title='{{trans('crudbooster.action_delete_selected')}}' 
                                         class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon-delete"></i>
                                        <span class="kt-nav__link-text">
                                            {{trans('crudbooster.action_delete_selected')}}
                                        </span> 
                                    </a>
                                </li>
                             @endif
                        </ul>
                    </div>
                </div>
            @endif
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">

                    <div class="kt-portlet__head-actions">
                        
                        &nbsp;
                        @if($button_filter)
                            <a href="javascript:void(0)" id='btn_advanced_filter' 
                            data-url-parameter='{{$build_query}}' 
                            title='{{trans('crudbooster.filter_dialog_title')}}'
                            class="btn btn-brand btn-elevate btn-icon-sm {{(Request::get('filter_column'))?'active':''}}">
                            <i class="fa fa-filter"></i>
                            {{trans("crudbooster.button_filter")}}
                        </a>
                        @endif          
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <form method='get'  action='{{Request::url()}}'>
               <div class="input-group">
                    <div class="input-group-prepend">
                    @if(Request::get('q'))
                        @php
                            $parameters = Request::all();
                            unset($parameters['q']);
                            $build_query = urldecode(http_build_query($parameters));
                            $build_query = ($build_query) ? "?".$build_query : "";
                            $build_query = (Request::all()) ? $build_query : "";
                        @endphp
                        <button type='button' onclick='location.href="{{ CRUDBooster::mainpath().$build_query}}"'
                                title="{{trans('crudbooster.button_reset')}}" class='nav_block btn btn-sm btn-warning'><i class='la la-close'></i></button>
                    @endif
                    </div>
                    <input type="text" name="q" value="{{ Request::get('q') }}" 
                        class="form-control" placeholder="{{trans('crudbooster.filter_search')}} . . .">
                        {!! CRUDBooster::getUrlParameters(['q']) !!}
                    <div class="input-group-append">
                        <button class="nav_block btn btn-secondary" type="submit">
                            <i class="la la-search"></i>
                        </button>
                    </div>
                </div>
            </form>
            @include("crudbooster::default.table")
        </div>
    </div>

   

    @if(!is_null($post_index_html) && !empty($post_index_html))
        {!! $post_index_html !!}
    @endif

@endsection
