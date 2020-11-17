@extends('admin/common/webmaster')
@section('title'," | Edit Blog")

@section('linkfile')

@endsection

@section('subheader')
<div class="kt-subheader__main">
	<h3 class="kt-subheader__title">Dashboard</h3>
	<span class="kt-subheader__separator kt-hidden"></span>
	<div class="kt-subheader__breadcrumbs">
		<a href="{{ route('admin') }}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
		<span class="kt-subheader__breadcrumbs-separator"></span>
		<a href="{{ route('blog.home') }}" class="kt-subheader__breadcrumbs-link">Blogs</a>
		<span class="kt-subheader__breadcrumbs-separator"></span>
		<a href="" class="kt-subheader__breadcrumbs-link">Edit Blog</a>
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
									Edit Blog
									</h3>
								</div>
								<div class="kt-portlet__head-toolbar">
									<div class="kt-portlet__head-wrapper">
										<a href="{{ route('blog.home') }}" class="btn btn-primary btn-icon-sm">
											<i class="la la-long-arrow-left"></i>Back
										</a>
									</div>
								</div>
							</div>
							<!--begin::Form-->
							<form class="kt-form" method="POST" action="{{ route('blog.update', ['slug'=>$edit->slug]) }}" enctype="multipart/form-data">
								@csrf
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

								<!--begin::Portlet-->
								<div class="kt-portlet kt-portlet--tabs">
										<div class="kt-portlet__head">
											<div class="kt-portlet__head-toolbar">
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
													<label class="col-2 col-form-label">Active Status</label>
													<div class="col-10 mb-4">
														<span class="kt-switch kt-switch--icon">
															<label>
																<input type="checkbox" name="status" id="status" @if ($edit->status == "active") checked @endif>
																<span></span>
															</label>
														</span>
													</div>
													<div class="col-6">
														<label>Blog Category</label>
														<select class="form-control select" name="blog_category_id">
															<option selected>Select Blog Category</option>
															@foreach ($blog_categories as $data)
																<option value="{{ $data->id }}" @if ($data->id == $edit->blog_category_id) selected @endif>{{ $data->name }}</option>
															@endforeach
														</select>
														<br />
													</div>
													<div class="col-6">
														<label>Blog Author</label>
														<select class="form-control select" name="blog_author_id">
															<option selected>Select Blog Author</option>
															@foreach ($blog_authors as $data)
																<option value="{{ $data->id }}" @if ($data->id == $edit->blog_author_id) selected @endif>{{ $data->name }}</option>
															@endforeach
														</select>
														<br />
													</div>
													<div class="col-12 mt-4">
														<label>Title</label>
														<input class="form-control" type="text" name="title" value="{{ $edit->title }}" placeholder="Enter Title"><br />
													</div>
													{{-- <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
														<div class="form-group">
															<label>Thumb Image</label>
															<input type="file" name="thumb_img" class="form-control-file">
															currently :- <a href="{{ asset('storage/app/blog_pics/'.$edit->thumb_img ) }}" target="_blank">{{ $edit->thumb_img }}</a>
														</div>
													</div> --}}
													<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
														<div class="form-group">
															<label>Header Image</label>
															<input type="file" name="header_img" class="form-control-file">
															currently :- <a href="{{ asset('storage/app/blog_pics/'.$edit->header_img ) }}" target="_blank">{{ $edit->header_img }}</a>
														</div>
													</div>
													<div class="col-12">
														<label>Post</label>
														<textarea id="editor1" class="form-control" rows="3" type="text" name="post" placeholder="Enter Post">{{ $edit->post }}</textarea><br />
													</div>
												</div>
												</div>
												<div class="tab-pane" id="kt_portlet_base_demo_3_2_tab_content" role="tabpanel">
													<div class="col-12">
														<label>Slug</label>
														<input class="form-control" type="text" name="slug" value="{{ $edit->slug }}" placeholder="Enter slug"><br />
													</div>
													<div class="col-12">
														<label>H1 Text</label>
														<input class="form-control" type="text" name="h1" value="{{ $edit->h1 }}" placeholder="Enter h1 text name"><br />
													</div>
													<div class="col-12">
														<label>Meta Title</label>
														<input class="form-control" type="text" name="meta_title" value="{{ $edit->meta_title }}" placeholder="Enter meta title"><br />
													</div>
													<div class="col-12">
														<label>Meta Description</label>
														<input class="form-control" type="text" name="meta_description" value="{{ $edit->meta_description }}" placeholder="Enter meta description"><br />
													</div>
												</div>
												
											</div>
										</div>
									</div>
									<!--end::Portlet-->
									<div class="kt-portlet__foot">
									<div class="kt-form__actions">
									<button type="submit" class="btn bg-success text-white">Update</button>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

<script>
$(document).ready(function() {
    $('.select').select2({
		theme: "classic"
	});
});
</script>

<script>
		$(document).ready(function(){
			$("label").css("font-weight", "bold");
		});
		</script>
@endsection