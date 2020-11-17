@extends('admin/common/webmaster')
@section('title'," | Add Testimonial")

@section('linkfile')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
@endsection

@section('subheader')
<div class="kt-subheader__main">
	<h3 class="kt-subheader__title">Dashboard</h3>
	<span class="kt-subheader__separator kt-hidden"></span>
	<div class="kt-subheader__breadcrumbs">
		<a href="{{ route('admin') }}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
		<span class="kt-subheader__breadcrumbs-separator"></span>
		<a href="{{ route('testimonial.home') }}" class="kt-subheader__breadcrumbs-link">Testimonials</a>
		<span class="kt-subheader__breadcrumbs-separator"></span>
		<a href="" class="kt-subheader__breadcrumbs-link">Add Testimonial</a>
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
						<h3 class="kt-portlet__head-title">Add Testimonial</h3>
					</div>
					<div class="kt-portlet__head-toolbar">
						<div class="kt-portlet__head-wrapper">
							<a href="{{ route('testimonial.home') }}" class="btn btn-primary btn-icon-sm">
								<i class="la la-long-arrow-left"></i>Back
							</a>
						</div>
					</div>
				</div>
								<form class="kt-form" method="POST" action="{{ route('testimonial.insert') }}" enctype="multipart/form-data">
									@csrf
									<div class="kt-portlet__body">
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
										<div class="row">
											<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
												<label>Name</label>
												<input class="form-control" type="text" name="name" placeholder="Enter Name"><br />
											</div>
											<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
												<label>Designation</label>
												<input class="form-control" type="text" name="designation" placeholder="Enter Designation"><br />
											</div>
											<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
												<div class="form-group">
													<label>Profile Image</label>
													<input type="file" name="profile_pic" class="form-control-file">
												</div>
											</div>
											<div class="col-12">
												<label>Intro</label>
												<textarea id="editor1" class="form-control" rows="3" type="text" name="info" placeholder="Enter lab intro"></textarea><br />
											</div>
										</div>
									</div>
										<div class="kt-portlet__foot">
											<div class="kt-form__actions">
												<button type="submit" class="btn bg-success text-white">Add Now</button>
											</div>
										</div>
								</form>
				</div>
			</div>
			<!--end::Portlet-->
				
			</div>
			<!--end::Portlet-->
		</div>
@endsection

@section('extrascript')
 <!-- CK Editor -->
<script src="{{URL::asset('public/admin/ckeditor/ckeditor.js')}}"></script>

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>

<script>
		$(document).ready(function(){
			$("label").css("font-weight", "bold");
		});
		</script>
@endsection