@extends('admin/common/webmaster')
@section('title'," | Blog Author View")

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
		<a href="" class="kt-subheader__breadcrumbs-link">Blog Author View</a>
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
							Blog Author View
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
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-4">
										<label>Blog Author Id :</label> {{ $showone->id }}<hr />
									</div>
									<div class="col-4">
										<label>Name :</label> {{ $showone->name }}<hr />
									</div>
									<div class="col-4">
										<label>Blog Author-slug :</label> {{ $showone->slug }}<hr />
									</div>
									<div class="col-12">
										<label>Image :</label><br />
										<a href="{{ asset('storage/app/blog_author_img/'.$showone->img ) }}" target="_blank">
											<img src="{{ asset('storage/app/blog_author_img/'.$showone->img ) }}" style="max-width:300px; max-height:180px;" /><hr />
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
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
