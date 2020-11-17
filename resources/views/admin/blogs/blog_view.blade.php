@extends('admin/common/webmaster')
@section('title'," | Blog View")

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
		<a href="" class="kt-subheader__breadcrumbs-link">Blog View</a>
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
							Blog View
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
			</div>
		</div>
			<!--end::Portlet-->

		<div class="col-6">
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
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-6">
										<label>Status :</label> {{ $showone->status }}<hr />
									</div>
									<div class="col-6">
										<label>Type :</label> {{ $showone->type }}<hr />
									</div>
									<div class="col-6">
										<label>Blog Id :</label> {{ $showone->id }}<hr />
									</div>
									<div class="col-6">
										<label>Title :</label> {{ $showone->title }}<hr />
									</div>
									<div class="col-12">
										<label>Thumb Image :</label><br />
										<a href="{{ asset('storage/app/blog_thumbnail/'.$showone->thumb_img ) }}" target="_blank">
											<img src="{{ asset('storage/app/blog_thumbnail/'.$showone->thumb_img ) }}" style="max-width:300px; max-height:180px;" /><hr />
										</a>
									</div>
									<div class="col-12">
										<label>Header Image :</label><br />
										<a href="{{ asset('storage/app/blog_pics/'.$showone->header_img ) }}" target="_blank">
											<img src="{{ asset('storage/app/blog_pics/'.$showone->header_img ) }}" style="max-width:300px; max-height:180px;" /><hr />
										</a>
									</div>
									<div class="col-12">
										<label>Post :</label> {!! $showone->post !!}<hr />
									</div>
								</div>	
							</div>
						</div>
					</div>
					<!--end::Portlet-->
				</div>
			</div>
		</div>

		<div class="col-6">
			<!--begin::Portlet-->
			<div class="kt-portlet">
				<div class="kt-portlet__head">
					<div class="kt-portlet__head-label">
						<h3 class="kt-portlet__head-title">
							SEO Settings View
						</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<label>Slug :</label> {{ $showone->slug }}<hr />
								<label>H1 Text :</label> {{ $showone->h1 }}<hr />
                  				<label>Meta title :</label> {{ $showone->meta_title }}<hr />
				          		<label>Meta Description :</label> {{ $showone->meta_description }}<hr />
							</div>
						</div>	
					</div>
				</div>
			</div>
			<!--end::Portlet-->
		</div>
	</div>
</div>


@if(isset($success))
{{ $success }}
@elseif(isset($error))
{{ $error }}
@endif

<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
	<div class="kt-portlet kt-portlet--mobile">
			<div class="kt-portlet__head kt-portlet__head--lg">
				<div class="kt-portlet__head-label">
					<span class="kt-portlet__head-icon">
						<i class="kt-font-brand flaticon2-line-chart"></i>
					</span>
					<h3 class="kt-portlet__head-title">
						Comments 
					</h3>
				</div>
			</div>
			<div class="kt-portlet__body">
				<!--begin: Search Form -->
				<div class="kt-form kt-form--label-right kt-margin-t-20 kt-margin-b-10">
					<div class="row align-items-center">
						<div class="col-xl-8 order-2 order-xl-1">
							<div class="row align-items-center">
								<div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
									<div class="kt-input-icon kt-input-icon--left">
										<form action="{{ route('blog.search') }}" method="POST" role="search">
										@csrf
											<div class="input-group">
												<input type="text" name="q" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
												<div class="input-group-append">
													<button class="btn btn-secondary" type="submit">
														<i class="fas fa-search"></i>
													</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end: Search Form -->
			</div>
									
			<!--begin: Datatable -->
			<div class="kt-portlet__body" id="list_search_result">
				<div class="kt-section">
					<div class="kt-section__content">
						<div class="row">
							<div class="col-12">
								<div class="table-responsive-md">
									<table class="table table-hover">
										<thead class="thead-light">
											<tr>
												<th>S.no</th>
												<th>Name</th>
												<th>Email</th>
												<th>Comment</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										<?php $no = 1; ?>
											@foreach($comments as $data)
												<tr>
													<th scope="row">{{ $no }}</th>
													<td>{{ $data->comment_name }}</td>
													<td>{{ $data->comment_email }}</td>
													<td>{{ $data->comment }}</td>
													{{-- <td style=""><i class="fa {{ ($data->status=='active') ? 'fa-check text-success':'fa-times text-danger' }} inline"></i></td> --}}
													<td>
														{{-- @if ($data->status == "active")
														<span class="kt-switch kt-switch--sm kt-switch--icon">
															<label>
																<input class="inputcheck" value="inactive" type="checkbox" id="status{{ $data->id }}" name="status"  @if ($data->status == "active") checked @endif data-id="{{ $data->id }}">
																<span></span>
															</label>
														</span>
														@else
														<span class="kt-switch kt-switch--sm kt-switch--icon">
															<label>
																<input class="inputcheck" value="active" type="checkbox" id="status{{ $data->id }}" name="status"  @if ($data->status == "active") checked @endif data-id="{{ $data->id }}">
																<span></span>
															</label>
														</span>
														@endif --}}
														<span class="kt-switch kt-switch--sm kt-switch--icon">
															<label>
																<input class="inputcheck" @if ($data->status=='active') value="inactive" @else value="active" @endif type="checkbox" id="status{{ $data->id }}" name="status"  @if ($data->status == "active") checked @endif data-id="{{ $data->id }}">
																<span></span>
															</label>
														</span>
													</td>
													<td>
														{{-- <a href="{{ route('blog.view', ['slug'=>$data->slug]) }}" class="btn btn-outline-info btn-elevate btn-icon"><i class="flaticon-eye"></i></a> --}}
														<button class="btn btn-outline-danger btn-elevate btn-icon" data-slug="{{ $data->slug }}" data-toggle="modal"  data-target="#deletemodal"><i class="flaticon-delete"></i></button>
													</td>
												</tr>
												<?php $no++; ?>
											@endforeach
										</tbody>
									</table>
									{{ $comments->appends(['sort' => 'votes'])->links() }}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--end: Datatable -->			
	</div>
</div>

<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete confirmation</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
		<form action="{{ route('blog.delete') }}" method="post">
        {{ method_field('delete')}}
		@csrf
		<div class="modal-body">
		<p>Are you sure, you want to delete this?</p>
		<input type="hidden" name="slug" id="data_slug" value="">
		</div>
		<div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit">Yes, Sure</button>
        </div>
		</form>
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

<script>
var SITE_URL = "{{ url('/') }}";
</script>

<script>
//Status Update

$("#list_search_result").on('change','.inputcheck',function() {

"use strict";

var msg='';

var msg_type='';

var id=$(this).attr('data-id');

var status=$(this).val();
var csrftoken ="{{ csrf_token() }}";

// var controller=$(this).attr("data-control");

$.ajax({

	type: 'POST',

	url: SITE_URL + '/admin/comment/update',

	headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},

	data: {id:id,status:status},


// alert('clicked ');

	cache: false,

	success: function(data){
		location.reload();

		 var jObj=JSON.parse(data);
 
		 if(jObj.status==="success"){

		   msg="Status has been updated successfully";

		   $('.toggle-switch__checkbox').val(jObj.status_changed);

		   msg_type='success';

		   //$(this).attr('checked',true);

		 }else{

		   msg="Something went wrong :( Please try again later"; 

		   msg_type='error';

		 }

		 swal({

			title: msg,

			type: msg_type,

			buttonsStyling: false,

			confirmButtonClass: 'btn btn-primary'

		  });

		  /*setTimeout(function() {

		  window.location.href = CURRENT_URL;}, 1000);*/

		}

}); 

});
</script>
@endsection