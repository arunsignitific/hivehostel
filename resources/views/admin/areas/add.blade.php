@extends('admin/common/webmaster')
@section('title'," | Add Area Tag")
@section('linkfile')
@endsection
@section('subheader')
<div class="kt-subheader__main">
	<h3 class="kt-subheader__title">Dashboard</h3>
	<span class="kt-subheader__separator kt-hidden"></span>
	<div class="kt-subheader__breadcrumbs">
		<a href="{{ route('admin') }}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
		<span class="kt-subheader__breadcrumbs-separator"></span>
		<a href="{{ route('amenities.home') }}" class="kt-subheader__breadcrumbs-link">Area Tags</a>
		<span class="kt-subheader__breadcrumbs-separator"></span>
		<a href="" class="kt-subheader__breadcrumbs-link">Add Area Tag</a>
		<!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
	</div>
</div>
@endsection
@section('content')
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
	<div class="row mt-3">
		<div class="col-12">
			<!--begin::Portlet-->
			<div class="kt-portlet">
				<div class="kt-portlet__head">
					<div class="kt-portlet__head-label">
						<h3 class="kt-portlet__head-title">Add Area Tag</h3>
					</div>
					<div class="kt-portlet__head-toolbar">
						<div class="kt-portlet__head-wrapper">
							<a href="{{ route('area.home') }}" class="btn btn-primary btn-icon-sm">
								<i class="la la-long-arrow-left"></i>Back
							</a>
						</div>
					</div>
				</div>
				<!--begin::Form-->
				<form class="kt-form" method="POST" action="{{ route('area.insert') }}" enctype="multipart/form-data">
					@csrf 
					<!--begin::Portlet-->
					<div class="kt-portlet kt-portlet--tabs">
						<div class="kt-portlet__head">
							<div class="kt-portlet__head-toolbar">
								@if ($errors->any())
								<div class="form-group form-group-last">
									<div class="alert alert-secondary fade show" role="alert">
										<div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
										<div class="alert-text">
											<ul>{!! implode('', $errors->all('<li style="color:red">:message</li>')) !!}</ul>
										</div>
										<div class="alert-close">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true"><i class="la la-close"></i></span>
											</button>
										</div>
									</div>
								</div>
								@endif
								<ul class="nav nav-tabs nav-tabs-line nav-tabs-line-brand nav-tabs-line-2x nav-tabs-line-right nav-tabs-bold" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#kt_portlet_base_demo_3_3_tab_content" role="tab">
											<i class="flaticon2-heart-rate-monitor" aria-hidden="true"></i>Section Details
										</a>
									</li>
									<!-- <li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_3_2_tab_content" role="tab">
											<i class="flaticon2-pie-chart-2" aria-hidden="true"></i>Amenities Settings
										</a>
									</li> -->
								</ul>
							</div>
						</div>
						<div class="kt-portlet__body">
							<div class="tab-content"> 
								<div class="tab-pane active" id="kt_portlet_base_demo_3_3_tab_content" role="tabpanel">
									<div class="row">
<label class="col-2 col-form-label">Active Status</label>
							<div class="col-10 mb-5">
								<span class="kt-switch kt-switch--icon">
									<label>
										<input type="checkbox" id="status" name="status">
										<span></span>
									</label>
								</span>
							</div>



										<div class="col-12  col-lg-7	">
										<label>Name</label>
										<input class="form-control" type="text" name="area_name" placeholder="Enter Area Name"><br />  
									</div>
								
								
									</div>
								</div>
							
							</div>
						</div>
					</div>
					<!--end::Portlet-->
					
					<div class="kt-portlet__foot">
						<div class="kt-form__actions">
							<button type="submit" class="btn bg-success text-white">Add Now</button>
						</div>
					</div>
				</form>
				<!--end::Form-->
			</div>
			<!--end::Portlet-->
		</div>
	</div>
</div>
@endsection
@section('extrascript')
<script>
$(document).ready(function(){
	$("label").css("font-weight", "bold");
});
</script>
@endsection