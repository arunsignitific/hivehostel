@extends('admin/common/webmaster')
@section('title'," | Edit Hostels")

@section('linkfile')

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
		<a href="" class="kt-subheader__breadcrumbs-link">Edit Hostels</a>
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
									<h3 class="kt-portlet__head-title">
									Edit Hostels
									</h3>
								</div>
								<div class="kt-portlet__head-toolbar">
									<div class="kt-portlet__head-wrapper">
										<a href="{{ route('hostels.home') }}" class="btn btn-primary btn-icon-sm">
											<i class="la la-long-arrow-left"></i>Back
										</a>
									</div>
								</div>
							</div>
							<!--begin::Form-->
							<form class="kt-form" method="POST" action="{{ route('hostels.update', ['id'=>$edit->id]) }}" enctype="multipart/form-data">
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
														<input type="checkbox" name="status" id="status" @if ($edit->status == "active") checked @endif>
														<span></span>
													</label>
												</span>
											</div>



							<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
								<label>Name</label>
								<input class="form-control" type="text" name="name" placeholder="Enter Hostel Name" value="{{ $edit->name }}"><br />
							</div>


							<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
								<label>Hostel Area</label>
								<input class="form-control" type="text" name="hostel_area" placeholder="Enter Hostel Area Name" value="{{ $edit->hostel_area }}"><br />  
							</div>


							<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
								<div class="form-group">
									<label>Profile Image</label>
									<input type="file" name="image_profile" class="form-control-file"><br />

									<input type="hidden" name="uploded_image_profile" value="{{ $edit->image_profile }}">

						<img src="{{ asset('storage/app/hostel-gallery/') }}/{{ $edit->image_profile }} " style="max-width:100px; max-height:100px;" />
								</div>
							</div>
							<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
								<div class="form-group">
									<label>Hostel Image</label>
									<input type="file" name="image_gallery[]" class="form-control-file" multiple><br />

									<input type="hidden" name="uploded_image_gallery" value="{{ $edit->image_gallery }}">


													<a href="{{ asset('storage/app/team_members_pic/'.$edit->image_gallery ) }}" target="_blank">
		<?php

		$img = json_decode($edit->image_gallery);
		if(!empty($img)){
		foreach($img as $imgs){
 
		?>
		<img src="{{ asset('storage/app/hostel-gallery/'.$imgs ) }}" style="max-width:100px; max-height:100px;" />
		<?php
		}
	}


		?> </a>
								</div>
							</div>
							<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
								<label>Hostel For</label>
								<select class="form-control" name="hostel_for" value="{{old('hostel_for')}}">
									<option value="{{$edit->hostel_for}}">Select Options</option>
									
									<?php
									if($edit->hostel_for =='boys' ){
									?>
									<option selected value="boys">Boys</option>
									<?php
									}elseif ($edit->hostel_for == 'girls') {
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
								<textarea id="editor1" class="form-control" rows="3" type="text" name="about_hostel" placeholder="Enter lab intro">{!!$edit->about_hostel!!}</textarea><br />
							</div>

							<div class="col-12">
								<label>Amenites</label>
								<textarea id="editor2" class="form-control" rows="3" type="text" name="near_by_amenites" placeholder="Enter lab intro" >{!!$edit->near_by_amenites!!}</textarea><br />
							</div>
							<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
								<div class="form-group">



									<label>Address</label>
									<input class="form-control" type="text" name="address" placeholder="Enter Hostel Name" value=" {{ $edit->address }}"> <br />
								</div>
							</div>
							<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
								<div class="form-group">
									<label>City</label>
									<input class="form-control" type="text" name="city" placeholder="Enter City" value=" {{ $edit->city }}"><br />
								</div>
							</div>
							<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
								<div class="form-group">
									<label>State</label>
									<input class="form-control" type="text" name="state" placeholder="Enter State" value=" {{ $edit->state }}"><br />
								</div>
							</div>
							<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
								<div class="form-group">
									<label>Pincode</label>
									<input class="form-control" type="text" name="pincode" placeholder="Enter Pincode" value=" {{ $edit->pincode }}"><br />
								</div>
							</div>
							<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
								<div class="form-group">
									<label>Location</label>
									<textarea class="form-control" type="text" name="location" placeholder="Enter Location">{{$edit->location}}
									</textarea>
									<br />
								</div>
							</div>
							<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
								<div class="form-group">
									<label>Number Of Rooms</label>
									<input class="form-control" type="text" name="no_of_room" placeholder="Enter Numbers of Room " value=" {{$edit->no_of_room}}"> <br />
								</div>
							</div>
							<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
								<div class="form-group">
									<label>Number Of Beds</label>
									<input class="form-control" type="text" name="no_of_beds" placeholder="Enter Numbers of Beds" value="{{$edit->no_of_beds}} "><br />
								</div>
							</div>
							<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
								<div class="form-group">
									<label>Price</label>
									<div class="row">
										<div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
											
											<div class="form-group">
												<input class="form-control" type="text" name="single" placeholder="single" value="{{$edit->single}}">
											</div>
										</div>
										<div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
											
											<div class="form-group">
												<input class="form-control" type="text" name="dubble" placeholder="dubble" value="{{$edit->dubble}}">
											</div>
										</div>
										<div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
											
											<div class="form-group">
												<input class="form-control" type="text" name="triple" placeholder="triple" value="{{$edit->triple}}">
											</div>
										</div>
										<div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
											
											<div class="form-group">
												<input class="form-control" type="text" name="quardruple" placeholder="quardruple" value="{{$edit->quardruple}}">
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

										$room_ami = json_decode($edit->hostel_amenities);
										foreach($amenitie as $amenities){
											$selected='';
										 if(!empty($room_ami)){
										 if(in_array($amenities->id, $room_ami)){ 
										 	$selected="selected";}
										 }
										?>
										<option <?= $selected;?> value="{{$amenities->id}}">{{$amenities->name}}</option>
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


							<?php 
							$university_ami =  explode(',', $edit->tags_university);

							    ?>
							<div class="col-md-6">
								<div id="output_university"></div>
								<div class="form-group">
									<label>Hostel University</label>
									<select data-placeholder="Choose tags ..." name="tags_university[]" multiple class="chosen-select-university form-control">
										
										<?php
										foreach($university as $amenities){

												$selected='';
										 if(!empty($university_ami)){
										 if(in_array($amenities->id, $university_ami)){ 
										 	$selected="selected";}
										 }

										?>
										<option <?php echo $selected;?> value="{{$amenities->id}}">{{$amenities->name}}</option>
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

								$tags_area = explode(',', $edit->tags_area);


										foreach($areas as $amenities){
										
											$selected='';
										 if(!empty($tags_area)){
										 if(in_array($amenities->id, $tags_area)){ 
										 	$selected="selected";}
										 }
										?>
										<option <?php echo $selected;?>  value="{{$amenities->id}}">{{$amenities->name}}</option>
										<?php
										}
										?>
										
									</select>


									<ul>
		

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
					$tags_pincode =  explode(',', $edit->tags_pincode);


										foreach($pincodes as $amenities){

												$selected='';
										 if(!empty($tags_pincode)){
										 if(in_array($amenities->id, $tags_pincode)){ 
										 	$selected="selected";}
										 }
										?>
										<option <?php echo $selected;?> value="{{$amenities->id}}">{{$amenities->name}}</option>
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
