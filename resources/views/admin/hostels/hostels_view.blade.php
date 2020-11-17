@extends('admin/common/webmaster')
@section('title'," | Team Member View")

@section('linkfile')

@endsection

@section('subheader')
<div class="kt-subheader__main">
	<h3 class="kt-subheader__title">Dashboard</h3>
	<span class="kt-subheader__separator kt-hidden"></span>
	<div class="kt-subheader__breadcrumbs">
		<a href="{{ route('admin') }}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
		<span class="kt-subheader__breadcrumbs-separator"></span>
		<a href="{{ route('team.home') }}" class="kt-subheader__breadcrumbs-link">Hostel</a>
		<span class="kt-subheader__breadcrumbs-separator"></span>
		<a href="" class="kt-subheader__breadcrumbs-link">Hostel View</a>
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
							Hostel View
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
				<div class="row">
					<div class="col-12">
						<div class="card">

							@foreach($hostels_info as $hostels)

	<div class="card-body">

<table class="table" style="width: 65%; margin: 2% auto;" >
	
	<tbody>
		
		<tr>
			<th>Name  :</th><td>{{ $hostels->name }}</td>
		</tr>

		<tr>
	<th>Image  :</th>

<td>
	<a href="{{ asset('storage/app/team_members_pic/'.$hostels->image_gallery ) }}" target="_blank">
		<?php
		$img = json_decode($hostels->image_gallery);
		foreach($img as $imgs){
		?>
		<img src="{{ asset('storage/app/hostel-gallery/'.$imgs ) }}" style="max-width:100px; max-height:100px;" />
		<?php
		}
		?>
</td>
		</tr>

		<tr>
			<th>Address  :</th><td>  {{ $hostels->address }} ,{{ $hostels->city }} , {{ $hostels->state }} - {{ $hostels->pincode }}</td>
		</tr>

		<tr>
			<th>Hostel for  :</th><td>{{ $hostels->hostel_for }}</td>
		</tr>

		<tr>
			<th>No of Room  :</th><td>{{ $hostels->no_of_room }}</td>
		</tr>


		<tr>
			<th>No of Beds  :</th><td>{{ $hostels->no_of_beds }}</td>
		</tr>

		<tr>
			<th>Single  :</th><td>{{ $hostels->single }}</td>
		</tr>


		<tr>
			<th>Subble  :</th><td>{{ $hostels->dubble }}</td>
		</tr>


		<tr>
			<th>Triple  :</th><td>{{ $hostels->triple }}</td>
		</tr>


		<tr>
			<th>Quardruple  :</th><td>{{ $hostels->quardruple }}</td>
		</tr>


		<tr>
			<th>Hostel Amenities  :</th>



<?php

$id = $hostels->id;

$room_ami = json_decode($hostels->hostel_amenities);


foreach ($room_ami as $amin_value) {

 $amin_info = DB::table('room_amenities')
    ->where('id', '=', $amin_value)
    ->get();

foreach($amin_info as $amin){

 ?>

<td>   
<p><?=$amin->name;?></p>


<p><img style="width: 100px; " src="{{url('/')}}/storage/app/team_members_pic/<?=$amin->icon;?>">  </p>
</td>

<?php
}

   
}



?>
				



		
		</tr>
	</tbody>
</table>

						
						
							</div>

							@endforeach
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