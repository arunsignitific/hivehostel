@extends('admin/common/webmaster')
@section('title'," | Add Team Member")
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
		<a href="{{ route('team.home') }}" class="kt-subheader__breadcrumbs-link">Our Teams</a>
		<span class="kt-subheader__breadcrumbs-separator"></span>
		<a href="" class="kt-subheader__breadcrumbs-link">Add Team Member</a>
		<!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
	</div>
</div>
@endsection
@section('content')
	<link rel="stylesheet" type="text/css" href="https://harvesthq.github.io/chosen/chosen.css">
	<script src="https://harvesthq.github.io/chosen/chosen.jquery.js"></script>

<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
	<div class="row mt-3">
		<div class="col-12">
			<!--begin::Portlet-->
			<div class="kt-portlet">
				<div class="kt-portlet__head">
					<div class="kt-portlet__head-label">
						<h3 class="kt-portlet__head-title">Add Team Member</h3>
					</div>
					<div class="kt-portlet__head-toolbar">
						<div class="kt-portlet__head-wrapper">
							<a href="{{ route('hostels.home') }}" class="btn btn-primary btn-icon-sm">
								<i class="la la-long-arrow-left"></i>Back
							</a>
						</div>
					</div>
				</div>
				<form class="kt-form" method="POST" action="{{ route('hostels.insert') }}" enctype="multipart/form-data">
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
							<label class="col-2 col-form-label">Active Status</label>
							<div class="col-10 mb-5">
								<span class="kt-switch kt-switch--icon">
									<label>
										<input type="checkbox" id="status" name="status">
										<span></span>
									</label>
								</span>
							</div>






							
							<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
								<label>Name</label>
								<input class="form-control" type="text" name="name" placeholder="Enter Hostel Name" value="{{old('name')}}"><br />
							</div>


							<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
								<label>Hostel Area</label>
								<input class="form-control" type="text" name="hostel_area" placeholder="Enter Hostel Area Name" value="{{old('hostel_area')}}"><br />
							</div>

							<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
								<div class="form-group">
									<label>Profile Image</label>
									<input type="file" name="image_profile" class="form-control-file"><br />
								</div> 
							</div>

							<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
								<div class="form-group">
									<label>Hostel Image</label>
									<input type="file" name="image_gallery[]" class="form-control-file" multiple><br />
								</div>
							</div>

							<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
								<label>Hostel For</label>
								   <select class="form-control" name="hostel_for" value="{{old('hostel_for')}}">

								   	<option value="">Select Options</option>
								   	
								   <?php

								   if(old('hostel_for') =='boys' ){
								   	?>
								   	<option selected value="boys">Boys</option>
								   	<?php
								   }elseif (old('hostel_for') == 'girls') {
								   	?>
								   	<option selected value="girls">Girls</option>
								   	<?php
								   }else{

								   	?>
						<option value="boys">Boys</option>
 					<option value="girls">Girls</option>
								   	<?php
								   }
								  ?>	
								   
								   </select><br />
							</div>
							
							<div class="col-12">
								<label>About Hostels</label>
								<textarea id="editor1" class="form-control" rows="3" type="text" name="about_hostel" placeholder="Enter lab intro">{{old('about_hostel')}}</textarea><br />
							</div>
 

							<div class="col-12">
								<label>Amenites</label>
								<textarea id="editor2" class="form-control" rows="3" type="text" name="near_by_amenites" placeholder="Enter lab intro" ></textarea><br />
							</div>



	<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
								<div class="form-group">
									<label>Address</label>
								<input class="form-control" type="text" name="address" placeholder="Enter Hostel Name" value="{{old('address')}}"> <br />
								</div>
							</div>


								<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
								<div class="form-group">
									<label>City</label>
									<input class="form-control" type="text" name="city" placeholder="Enter City" value="{{old('city')}}"><br />
								</div>
							</div>


							<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
								<div class="form-group">
									<label>State</label>
								<input class="form-control" type="text" name="state" placeholder="Enter State" value="{{old('state')}}"><br />
								</div>
							</div>


								<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
								<div class="form-group">
									<label>Pincode</label>
								<input class="form-control" type="text" name="pincode" placeholder="Enter Pincode" value="{{old('pincode')}}"><br />
								</div>
							</div>



							<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
								<div class="form-group">
									<label>Location</label>
								<textarea class="form-control" type="text" name="location" placeholder="Enter Location">{{old('location')}}
									</textarea>
									<br />
								</div>
							</div>

								<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
								<div class="form-group">
									<label>Number Of Rooms</label>
						<input class="form-control" type="text" name="no_of_room" placeholder="Enter Numbers of Room " value="{{old('no_of_room')}}"> <br />
								</div>
							</div>
								<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
								<div class="form-group">
									<label>Number Of Beds</label>
								<input class="form-control" type="text" name="no_of_beds" placeholder="Enter Numbers of Beds" value="{{old('no_of_beds')}}"><br />
								</div>
							</div>
					<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
						<div class="form-group">
							<label>Price</label>
							<div class="row">
								<div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
									
									<div class="form-group">
										<input class="form-control" type="text" name="single" placeholder="single" value="{{old('single')}}">
									</div>
								</div>
								<div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
									
									<div class="form-group">
										<input class="form-control" type="text" name="dubble" placeholder="dubble" value="{{old('dubble')}}">
									</div>
								</div>
								<div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
									
									<div class="form-group">
										<input class="form-control" type="text" name="triple" placeholder="triple" value="{{old('triple')}}">
									</div>
								</div>
								<div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
									
									<div class="form-group">
										<input class="form-control" type="text" name="quardruple" placeholder="quardruple" value="{{old('quardruple')}}">
									</div>
								</div>
							</div>
							
						</div>
					</div>



<div class="col-md-6">

	<div id="output"></div>
	<div class="form-group">
		<label>Hostel Amenities</label>
		<select data-placeholder="Choose tags ..." name="tags[]" multiple class="chosen-select form-control">
			
			<?php
			foreach($amenitie as $amenities){
			?>
			<option value="{{$amenities->id}}">{{$amenities->name}}</option>
			<?php
			}
			?>
			
		</select>
	</div>
	<script type="text/javascript">
	document.getElementById('output').innerHTML = location.search;
	$(".chosen-select").chosen();
	</script>
</div>





<div class="col-md-6">

	<div id="output_university"></div>
	<div class="form-group">
		<label>Hostel University</label>
		<select data-placeholder="Choose tags ..." name="tags_university[]" multiple class="chosen-select-university form-control">
			
			<?php
			foreach($university as $amenities){
			?>
			<option value="{{$amenities->id}}">{{$amenities->name}}</option>
			<?php
			}
			?>
			
		</select>
	</div>
	<script type="text/javascript">
	document.getElementById('output_university').innerHTML = location.search;
	$(".chosen-select-university").chosen();
	</script>
</div>



<div class="col-md-6">

	<div id="output_area"></div>
	<div class="form-group">
		<label>Hostel Area</label>
		<select data-placeholder="Choose tags ..." name="tags_area[]" multiple class="chosen-select-area form-control">
			
			<?php
			foreach($areas as $amenities){
			?>
			<option value="{{$amenities->id}}">{{$amenities->name}}</option>
			<?php
			}
			?>
			
		</select>
	</div>
	<script type="text/javascript">
	document.getElementById('output_area').innerHTML = location.search;
	$(".chosen-select-area").chosen();
	</script>
</div>


<div class="col-md-6">

	<div id="output_pincodes"></div>
	<div class="form-group">
		<label>Hostel Pincode</label>
		<select data-placeholder="Choose tags ..." name="tags_pincode[]" multiple class="chosen-select-pincode form-control">
			
			<?php
			foreach($pincodes as $amenities){
			?>
			<option value="{{$amenities->id}}">{{$amenities->name}}</option>
			<?php
			}
			?>
			
		</select>
	</div>
	<script type="text/javascript">
	document.getElementById('output_pincodes').innerHTML = location.search;
	$(".chosen-select-pincode").chosen();
	</script>
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


<script>
	
$(document).ready( function(){

	$('.input_price').hide();
  
  $('.select_price').change( function(){


  	$('.input_price').show();
  })

});
</script>

<!-- CK Editor -->
<script src="{{URL::asset('public/admin/ckeditor/ckeditor.js')}}"></script>
<script>
$(function () {
// Replace the <textarea id="editor1"> with a CKEditor
// instance, using default configuration.
CKEDITOR.replace('editor1')
CKEDITOR.replace('editor2')
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