<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
	<div class="kt-header-mobile__logo">
		<a href="{{ url('/') }}">
			<img alt="Logo" style="max-width:65px;"  src="{{ CRUDBooster::getSetting('favicon')?asset(CRUDBooster::getSetting('favicon')):asset('vendor/crudbooster/assets/logo_crudbooster.png') }}" />
		</a>
	</div>
	<div class="kt-header-mobile__toolbar">
		<button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
		<button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button>
		<button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
	</div>
</div>