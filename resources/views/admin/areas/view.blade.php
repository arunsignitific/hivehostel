@extends('admin/common/webmaster')
@section('title'," | SEO Tag View")

@section('linkfile')
@endsection

@section('subheader')
<div class="kt-subheader__main">
	<h3 class="kt-subheader__title">Dashboard</h3>
	<span class="kt-subheader__separator kt-hidden"></span>
	<div class="kt-subheader__breadcrumbs">
		<a href="{{ route('admin') }}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
		<span class="kt-subheader__breadcrumbs-separator"></span>
		<a href="{{ route('gallery.home') }}" class="kt-subheader__breadcrumbs-link">Gallery</a>
		<span class="kt-subheader__breadcrumbs-separator"></span>
		<a href="" class="kt-subheader__breadcrumbs-link">Gallery View</a>
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
							Gallery View
						</h3>  
					</div>
					<div class="kt-portlet__head-toolbar">
						<div class="kt-portlet__head-wrapper">
							<a href="{{ route('amenities.home') }}" class="btn btn-primary btn-icon-sm">
								<i class="la la-long-arrow-left"></i>Back
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
			<!--end::Portlet-->

			<!--begin::Portlet-->
			<div class="kt-portlet">
				<div class="kt-portlet__head">
					<div class="kt-portlet__head-label">
						<h3 class="kt-portlet__head-title">
							Gallery View
						</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-12">

						@foreach($amenities as $amenitie)
						<div class="card">
							<div class="card-body">


							  <table class="table" style="margin: 1% auto; width: 70%;" >
							  	
							  	<tbody>
							  		<tr>
							  			<th style="width:  150px; height: 50px;">Name : </th> <td>{{$amenitie->name}}</td>
							  		</tr>

							  		<tr>
							  			<th style="width:  150px; height: 50px;">Image : </th> <td>
<img style="width: 100px; " src="{{url('storage/app/team_members_pic/')}}/{{$amenitie->icon}}"  >
							  		
							  			</td>  
							  		</tr>
							  	</tbody>
							  </table>
							</div>
						</div>

						@endforeach
					</div>
					<!--end::Portlet-->
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