@extends('admin/common/webmaster')
@section('title'," | Testimonial")

@section('linkfile')

@endsection

@section('subheader')
<div class="kt-subheader__main">
	<h3 class="kt-subheader__title">Dashboard</h3>
	<span class="kt-subheader__separator kt-hidden"></span>
	<div class="kt-subheader__breadcrumbs">
		<a href="{{ route('admin') }}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
		<span class="kt-subheader__breadcrumbs-separator"></span>
		<a href="" class="kt-subheader__breadcrumbs-link">Testimonials</a>
		<!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
	</div>
</div>
@endsection

@section('content')

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
						Testimonial List
					</h3>
				</div>
				<div class="kt-portlet__head-toolbar">
					<div class="kt-portlet__head-wrapper">
						<a href="{{ route('testimonial.add') }}" class="btn btn-brand btn-icon-sm">
							<i class="flaticon2-plus"></i> Add New
						</a>
					</div>
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
										<form action="{{ route('testimonial.search') }}" method="POST" role="search">
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
			<div class="kt-portlet__body">
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
												<th>Designation</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										<?php $no = 1; ?>
											@foreach($testimonials as $data)
												<tr>
													<th scope="row">{{ $no }}</th>
													<td>{{ $data->name }}</td>
													<td>{{ $data->designation }}</td>
													<td>
														<a href="{{ route('testimonial.view', ['slug'=>$data->slug]) }}" class="btn btn-outline-info btn-elevate btn-icon"><i class="flaticon-eye"></i></a>
														<a href="{{ route('testimonial.edit', ['slug'=>$data->slug]) }}" class="btn btn-outline-warning btn-elevate btn-icon"><i class="flaticon-edit"></i></a>
														<button class="btn btn-outline-danger btn-elevate btn-icon" data-slug="{{ $data->slug }}" data-toggle="modal"  data-target="#deletemodal"><i class="flaticon-delete"></i></button>
													</td>
												</tr>
												<?php $no++; ?>
											@endforeach
										</tbody>
									</table>
									{{ $testimonials->appends(['sort' => 'votes'])->links() }}
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
		<form action="{{ route('testimonial.delete') }}" method="post">
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
@endsection