@extends('admin/common/webmaster')
@section('title'," | Add Gallery Tag")
@section('linkfile')
@endsection
@section('subheader')
<div class="kt-subheader__main">
	<h3 class="kt-subheader__title">Dashboard</h3>
	<span class="kt-subheader__separator kt-hidden"></span>
	<div class="kt-subheader__breadcrumbs">
		<a href="{{ route('admin') }}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
		<span class="kt-subheader__breadcrumbs-separator"></span>
		<a href="{{ route('gallery.home') }}" class="kt-subheader__breadcrumbs-link">Gallery Tags</a>
		<span class="kt-subheader__breadcrumbs-separator"></span>
		<a href="" class="kt-subheader__breadcrumbs-link">Add Gallery Tag</a>
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
						<h3 class="kt-portlet__head-title">Add Gallery Tag</h3>
					</div>
					<div class="kt-portlet__head-toolbar">
						<div class="kt-portlet__head-wrapper">
							<a href="{{ route('gallery.home') }}" class="btn btn-primary btn-icon-sm">
								<i class="la la-long-arrow-left"></i>Back
							</a>
						</div>    
					</div>
				</div>
				<!--begin::Form-->
				<form class="kt-form" method="POST" action="{{ route('gallery.insert') }}" enctype="multipart/form-data">
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
										<label>For Hostel</label>
										<select class="form-control" name="hostel_id">
<option value="">Select Hostels</option>
										<?php 

										foreach($hostel as $hostels){

													?>
								<option value="{{$hostels->id}}">{{$hostels->name}}</option>
<?php

										}

										?>  

									
										</select>
									</div>

										<div class="col-12  col-lg-7	">
										<label>Name</label>
										<input class="form-control" type="text" name="image_name" placeholder="Enter Room Gallery Name"><br />
									</div>
									<div class="col-12  col-lg-7	">
										<label>Images</label>
										<input class="form-control" type="file" name="gallery_image[]" multiple placeholder="Enter Room Gallery Icon"><br /> 
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