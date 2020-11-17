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
		<a href="{{ route('seo.home') }}" class="kt-subheader__breadcrumbs-link">SEO Tags</a>
		<span class="kt-subheader__breadcrumbs-separator"></span>
		<a href="" class="kt-subheader__breadcrumbs-link">SEO Tag View</a>
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
							<a href="{{ route('gallery.home') }}" class="btn btn-primary btn-icon-sm">
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
							Section Details View
						</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-12">

@foreach($gallery as $img)

						<div class="card">
							<div class="card-body">




<table class="table" style=" margin: 2% auto;" >
	
	<tbody>
		
		<tr>
			<th>Name  :</th><td>{{ $img->name }}</td>
		</tr>

		<tr>
	<th>Image  :</th>

<td>   
<ul>


	<?php

$img_gallery = $img->images;


$img_gal = json_decode($img_gallery);

foreach($img_gal as $gallery){

?>


	<li style="display: inline-block;">	<img src="{{ url('storage/app/hostel-gallery/'.$gallery)}}" style="max-width:100px; max-height:100px;" /></li>


  

<?php

}

	?>

</ul>	
	
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