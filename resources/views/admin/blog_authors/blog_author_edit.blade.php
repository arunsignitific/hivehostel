@extends('admin/common/webmaster')
@section('title'," | Edit Blog Author")

@section('linkfile')

@endsection

@section('subheader')
<div class="kt-subheader__main">
	<h3 class="kt-subheader__title">Dashboard</h3>
	<span class="kt-subheader__separator kt-hidden"></span>
	<div class="kt-subheader__breadcrumbs">
		<a href="{{ route('admin') }}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
		<span class="kt-subheader__breadcrumbs-separator"></span>
		<a href="{{ route('blogAuthor.home') }}" class="kt-subheader__breadcrumbs-link">Blog Authors</a>
		<span class="kt-subheader__breadcrumbs-separator"></span>
		<a href="" class="kt-subheader__breadcrumbs-link">Edit Blog Author</a>
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
									<h3 class="kt-portlet__head-title">
									Edit Blog Author
									</h3>
								</div>
								<div class="kt-portlet__head-toolbar">
									<div class="kt-portlet__head-wrapper">
										<a href="{{ route('blogAuthor.home') }}" class="btn btn-primary btn-icon-sm">
											<i class="la la-long-arrow-left"></i>Back
										</a>
									</div>
								</div>
							</div>
							<!--begin::Form-->
							<form class="kt-form" method="POST" action="{{ route('blogAuthor.update', ['slug'=>$edit->slug]) }}" enctype="multipart/form-data">
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
											<input class="form-control" type="text" name="name" value="{{ $edit->name }}" placeholder="Enter Name"><br />
											</div>
											<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
												<label>Slug</label>
												<input class="form-control" type="text" name="slug" value="{{ $edit->slug }}" placeholder="Enter Slug"><br />
											</div>
											<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
												<div class="form-group">
													<label>Image</label>
													<input type="file" name="img" class="form-control-file">
													
													currently :- <a href="{{ asset('storage/app/blog_author_img/'.$edit->img ) }}" target="_blank">{{ $edit->img }}</a>
												</div>
											</div>
										</div>
											<!--end::Portlet-->
									</div>
									<div class="kt-portlet__foot">
										<div class="kt-form__actions">
											<button type="submit" class="btn bg-success text-white">Update</button>
										</div>
									</div>
								</form>
							<!-- Editable table -->
	</div>
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
