@extends('admin/common/webmaster')
@section('title'," | DashBoard")

@section('linkfile')

@endsection

@section('subheader')
<div class="kt-subheader__main">
<h3 class="kt-subheader__title">
	DashBoard</h3>
<span class="kt-subheader__separator kt-hidden"></span>
<div class="kt-subheader__breadcrumbs">
	<a href="{{ url('/admin') }}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
	<!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
</div> 
</div>
@endsection

@section('content')

	
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
	<div class="row mt-3">
		<div class="col-12">
<!--Begin::Section-->
<div class="row">
	<div class="col-xl-8">
		<div class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile ">
			<div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
				<div class="kt-portlet__head-label">
				</div>
			</div>
			<div class="kt-portlet__body kt-portlet__body--fit">

				
			</div>
		</div>
	</div>
	<div class="col-xl-4">
	</div>

	<div class="col-xl-8">
			<div class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile ">
				<div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
					<div class="kt-portlet__head-label">
						{{-- <h3 class="kt-portlet__head-title">
							Non Motor Policies Expire in 1 Month
						</h3> --}}
					</div>
				</div>
				<div class="kt-portlet__body kt-portlet__body--fit">
	
					
				</div>
			</div>
		</div>
		<div class="col-xl-4">
		</div>
</div>

<!--End::Section-->
		</div>
	</div></div>

	
@endsection

@section('extrascript')
@endsection