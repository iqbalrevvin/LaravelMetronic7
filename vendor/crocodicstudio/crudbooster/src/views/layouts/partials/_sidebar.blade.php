<!-- begin:: Aside -->
<button class="kt-aside-close " id="kt_aside_close_btn">
   <i class="la la-close"></i>
</button>
<div class="kt-aside  kt-aside--fixed kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">
   <!-- begin:: Brand -->
   <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
      <div class="kt-aside__brand-logo">
         <a href="{{ url('/admin') }}">
            <img alt="Logo" style="max-width:65px;"  src="{{ CRUDBooster::getSetting('favicon')?asset(CRUDBooster::getSetting('favicon')):asset('vendor/crudbooster/assets/logo_crudbooster.png') }}" />
         </a>
      </div>
   </div>
   <!-- end:: Brand -->
   <!-- begin:: Aside Menu -->
   <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
      <div id="kt_aside_menu" class="kt-aside-menu  kt-aside-menu--dropdown " data-ktmenu-vertical="1" data-ktmenu-dropdown="1" data-ktmenu-scroll="0">
         <ul class="kt-menu__nav ">
            <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--submenu-fullheight kt-menu__item--open kt-menu__item--here" aria-haspopup="true" data-ktmenu-submenu-toggle="click" data-ktmenu-dropdown-toggle-class="kt-aside-menu-overlay--on">
               <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                  <i class="kt-menu__link-icon flaticon-menu-button"></i>
                  <span class="kt-menu__link-text">{{trans("crudbooster.menu_navigation")}}</span>
                  <i class="kt-menu__ver-arrow la la-angle-right"></i>
               </a>
               <div class="kt-menu__submenu ">
                  <span class="kt-menu__arrow"></span>
                  <div class="kt-menu__wrapper">
                     <ul class="kt-menu__subnav">
                        <li class="kt-menu__item  kt-menu__item--parent kt-menu__item--submenu-fullheight" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">{{trans("crudbooster.menu_navigation")}}</span></span></li>
                        @php
                           $dashboard = CRUDBooster::sidebarDashboard();
                        @endphp
                        @if($dashboard)
                           <li data-id="{{$dashboard->id}}" 
                              class="kt-menu__item {{ (Request::is(config('crudbooster.ADMIN_PATH'))) ? 'kt-menu__item--active' : '' }}" 
                              aria-haspopup="true">
                              <a href="{{CRUDBooster::adminPath()}}" class="kt-menu__link nav_block">
                                 <span class="kt-menu__link-text">{{trans("crudbooster.text_dashboard")}}</span>
                              </a>
                           </li>
                        @endif
                        @foreach(CRUDBooster::sidebarMenu() as $menu)
                        <li data-id="{{$menu->id}}"
                            class="kt-menu__item {{(!empty($menu->children))?"kt-menu__item--submenu":""}} {{ (Request::is($menu->url_path."*"))?"kt-menu__item--open kt-menu__item--here":""}}" 
                           aria-haspopup="true" 
                           @if (!empty($menu->children))
                              data-ktmenu-submenu-toggle="click" 
                              data-ktmenu-submenu-mode="accordion"
                           @endif
                           >
                           <a href="{{ ($menu->is_broken)?"javascript:alert('".trans('crudbooster.controller_route_404')."')":$menu->url }}"
                              class="kt-menu__link @if (!empty($menu->children)) kt-menu__toggle @else nav_block @endif">
                              <i class="kt-menu__link-icon {{$menu->icon}}"></i>
                                 <span class="kt-menu__link-text">{{$menu->name}}</span>
                                 @if(!empty($menu->children))<i class="kt-menu__ver-arrow la la-angle-right"></i>@endif
                           </a>
                           @if(!empty($menu->children))
                           <div class="kt-menu__submenu ">
                              <span class="kt-menu__arrow"></span>
                              <ul class="kt-menu__subnav">
                                 @foreach($menu->children as $child)
                                    <li data-id='{{$child->id}}' 
                                    class="kt-menu__item {{(Request::is($child->url_path .= !ends_with(Request::decodedPath(), $child->url_path) ? "/*" : ""))?"kt-menu__item--active":""}} nav_block" 
                                       aria-haspopup="true">
                                       <a href="{{ ($child->is_broken)?"javascript:alert('".trans('crudbooster.controller_route_404')."')":$child->url}}" 
                                          class="kt-menu__link ">
                                          <i class="kt-menu__link-icon {{$child->icon}}"></i>
                                          <span class="kt-menu__link-text">{{$child->name}}</span>
                                       </a>
                                    </li>
                                 @endforeach
                              </ul>
                           </div>
                           @endif
                        </li>
                        @endforeach
                     </ul>
                  </div>
               </div>
            </li>
 
          

            <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--bottom-2" aria-haspopup="true" 
               data-ktmenu-submenu-toggle="click">
               @if(CRUDBooster::isSuperadmin())
                  <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                     <i class="kt-menu__link-icon flaticon2-gear"></i>
                     <span class="kt-menu__link-text">Pengaturan Aplikasi</span>
                     <i class="kt-menu__ver-arrow la la-angle-right"></i>
                  </a>
               @endif
               <div class="kt-menu__submenu kt-menu__submenu--up">
                  <span class="kt-menu__arrow"></span>
                  <ul class="kt-menu__subnav">
                     <li class="kt-menu__item kt-menu__item--parent kt-menu__item--bottom-1" aria-haspopup="true">
                        <span class="kt-menu__link">
                           <span class="kt-menu__link-text">Pengaturan Aplikasi</span>
                        </span>
                     </li>
                     <li class="kt-menu__item" aria-haspopup="true">
                        <a href="{{route("SettingsControllerGetAdd")}}" 
                           class="kt-menu__link {{ (Request::is(config('crudbooster.ADMIN_PATH').'/settings/add*')) ? 'kt-menu__item--active' : '' }} nav_block">
                           <i class="kt-menu__link-icon flaticon-add"></i>
                           <span class="kt-menu__link-text">Tambah Pengaturan</span>
                        </a>
                        @php
                           $groupSetting = DB::table('cms_settings')->groupby('group_setting')->pluck('group_setting');
                        @endphp
                        @foreach ($groupSetting as $gs)
                           <li class="kt-menu__item {{ ($gs == Request::get('group')) ? 'kt-menu__item--active' : '' }}" aria-haspopup="true">
                           <a href="{{route("SettingsControllerGetShow")}}?group={{urlencode($gs)}}&m=0" 
                              class="kt-menu__link nav_block">
                              <i class="kt-menu__link-icon flaticon-cogwheel"></i>
                              <span class="kt-menu__link-text">{{ $gs }}</span>
                           </a>
                        </li>
                        @endforeach
                        <div class="kt-menu__submenu">
                           <span class="kt-menu__arrow"></span>
                           <ul class="kt-menu__subnav">
                              <li class="kt-menu__item " aria-haspopup="true">
                                 <a href="#" class="kt-menu__link ">
                                    <i class="kt-menu__link-icon flaticon-computer"></i>
                                    <span class="kt-menu__link-text">Pending</span>
                                    <span class="kt-menu__link-badge">
                                       <span class="kt-badge kt-badge--brand">7</span>
                                    </span>
                                 </a>
                              </li>
                           </ul>
                        </div>
                     </li>
                  </ul>
               </div>
            </li>
         </ul>
      </div>
   </div>
   <!-- end:: Aside Menu -->
</div>
<div class="kt-aside-menu-overlay"></div>
<!-- end:: Aside -->