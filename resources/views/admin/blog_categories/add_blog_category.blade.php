@extends('admin/common/webmaster')
@section('title'," | Add Blog Category")

@section('linkfile')

@endsection

@section('subheader')
<div class="kt-subheader__main">
	<h3 class="kt-subheader__title">Dashboard</h3>
	<span class="kt-subheader__separator kt-hidden"></span>
	<div class="kt-subheader__breadcrumbs">
		<a href="{{ route('admin') }}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
		<span class="kt-subheader__breadcrumbs-separator"></span>
		<a href="{{ route('blogCategory.home') }}" class="kt-subheader__breadcrumbs-link">Blog Categories</a>
		<span class="kt-subheader__breadcrumbs-separator"></span>
		<a href="" class="kt-subheader__breadcrumbs-link">Add Blog Category</a>
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
						<h3 class="kt-portlet__head-title">Add Blog Category</h3>
					</div>
					<div class="kt-portlet__head-toolbar">
						<div class="kt-portlet__head-wrapper">
							<a href="{{ route('blogCategory.home') }}" class="btn btn-primary btn-icon-sm">
								<i class="la la-long-arrow-left"></i>Back
							</a>
						</div>
					</div>
				</div>
				<!--begin::Form-->
				<form class="kt-form" method="POST" action="{{ route('blogCategory.insert') }}" enctype="multipart/form-data">
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
													<li class="nav-item">
														<a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_3_2_tab_content" role="tab">
															<i class="flaticon2-pie-chart-2" aria-hidden="true"></i>SEO Settings
														</a>
													</li>
												</ul>
											</div>
										</div>
										<div class="kt-portlet__body">
											<div class="tab-content">
												<div class="tab-pane active" id="kt_portlet_base_demo_3_3_tab_content" role="tabpanel">
													<div class="row">
														<div class="col-12">
															<label>Name</label>
															<input class="form-control" type="text" name="name" placeholder="Enter Name"><br />
														</div>
														<div class="col-12">
															<label>Parent</label>
															<input class="form-control" type="text" name="parent" placeholder="Enter Parent"><br />
														</div>
														<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
															<div class="form-group">
																<label>Image</label>
																<input type="file" name="img" class="form-control-file">
															</div>
														</div>
													</div>
												</div>
												<div class="tab-pane" id="kt_portlet_base_demo_3_2_tab_content" role="tabpanel">
													<div class="col-12">
														<label>Slug</label>
														<input class="form-control" type="text" name="slug" placeholder="Enter slug"><br />
													</div>
													<div class="col-12">
														<label>H1 Text</label>
														<input class="form-control" type="text" name="h1" placeholder="Enter H1 text name"><br />
													</div>
													<div class="col-12">
														<label>Meta Title</label>
														<input class="form-control" type="text" name="meta_title" placeholder="Enter meta title"><br />
													</div>
													<div class="col-12">
														<label>Meta Description</label>
														<input class="form-control" type="text" name="meta_description" placeholder="Enter meta description"><br />
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