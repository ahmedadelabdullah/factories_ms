@extends('layouts.master')
@section('css')
<!-- Internal Select2 css -->
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Edit-Profile</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</div>
						<div class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-3 mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm">
					<!-- Col -->
					<div class="col-lg-4">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="pl-0">
									<div class="main-profile-overview">
										<div class="main-img-user profile-user">
											<img alt="" src="{{(!empty(Auth::user()->photo)) ? url('uploads/profile_images/' . Auth::user()->photo) : url('uploads/profile_images/no_image.png')}}"><a class="fas fa-camera profile-edit" href="JavaScript:void(0);"></a>
										</div>
										<div class="d-flex justify-content-between mg-b-20">
											<div class="text-capitalize">
												<h5 class="main-profile-name">{{$user->name}}</h5>
												<p class="main-profile-name-text">{{$user->user_name}}</p>
											</div>
										</div>

										<label class="main-content-label tx-13 mg-b-20">Info</label>
										<div class="main-profile-social-list text-capitalize">
											<div class="media">
												<div class="media-icon bg-primary-transparent text-primary">
													<i class="icon ion-logo-github"></i>
												</div>
												<div class="media-body">
													<span>name</span> <a href="">{{$user->name}}</a>
												</div>
											</div>

											<div class="media">
												<div class="media-icon bg-primary-transparent text-primary">
													<i class="icon ion-logo-github"></i>
												</div>
												<div class="media-body">
													<span>user name</span> <a href="">{{$user->user_name}}</a>
												</div>
											</div>


											<div class="media">
												<div class="media-icon bg-primary-transparent text-primary">
													<i class="icon ion-logo-github"></i>
												</div>
												<div class="media-body">
													<span>Phone</span> <a href="">{{$user->phone}}</a>
												</div>
											</div>

											<div class="media">
												<div class="media-icon bg-primary-transparent text-primary">
													<i class="icon ion-logo-github"></i>
												</div>
												<div class="media-body">
													<span>email</span> <a href="">{{$user->email}}</a>
												</div>
											</div>

											<div class="media">
												<div class="media-icon bg-success-transparent text-success">
													<i class="icon ion-logo-twitter"></i>
												</div>
												<div class="media-body">
													<span>address</span> <a href="">{{$user->address}}</a>
												</div>
											</div>

											
										
									
			
										</div>
								
										<!--skill bar-->
									</div><!-- main-profile-overview -->
								</div>
							</div>
						</div>
					
					</div>

					<!-- Col -->
					<div class="col-lg-8">
						<div class="card">
							<div class="card-body">
								<div class="mb-4 main-content-label">Personal Information</div>
								<form class="form-horizontal" action="{{route('admin.profile.update')}}" method="POST" enctype="multipart/form-data">
							@csrf
							@method('PATCH')
									<div class="form-group ">
										<div class="row">
											<div class="col-md-3">
												<label class="form-label">Name</label>
											</div>
											<div class="col-md-9">
												<input type="text" name="name" class="form-control"  placeholder="User Name" value="{{$user->name}}">
											</div>
										</div>
									</div>
									<div class="form-group ">
										<div class="row">
											<div class="col-md-3">
												<label class="form-label">User Name</label>
											</div>
											<div class="col-md-9">
												<input type="text" name="user_name" class="form-control"  placeholder="User Name" value="{{$user->user_name}}">
											</div>
										</div>
									</div>
									<div class="form-group ">
										<div class="row">
											<div class="col-md-3">
												<label class="form-label">Phone</label>
											</div>
											<div class="col-md-9">
												<input type="text" name="phone" class="form-control"  placeholder="Phone" value="{{$user->phone}}">
											</div>
										</div>
									</div>
									<div class="form-group ">
										<div class="row">
											<div class="col-md-3">
												<label class="form-label">Email</label>
											</div>
											<div class="col-md-9">
												<input type="text" name="email" class="form-control"  placeholder="Last Name" value="{{$user->email}}">
											{{$errors->first('email')}}
											</div>
										</div>
									</div>
									<div class="form-group ">
										<div class="row">
											<div class="col-md-3">
												<label class="form-label">Address</label>
											</div>
											<div class="col-md-9">
												<input type="text" name="address" class="form-control"  placeholder="Nick Name" value="{{$user->address}}">
											</div>
										</div>
									</div>

									<div class="form-group ">
										<div class="row">
											<div class="col-md-3">
												<label class="form-label">Photo</label>
											</div>
											<div class="col-md-9">
												<input type="file" name="photo" class="form-control" id="image">

											</div>
										</div>
									</div>

									<div class="form-group ">
										<div class="row">
											<div class="col-md-3">
												<label class="form-label"></label>
											</div>
											<div class="col-md-9">
												<img alt="user-img"  id="image_view" class="avatar avatar-xl brround" src="{{(!empty(Auth::user()->photo)) ? url('uploads/profile_images/' . Auth::user()->photo) : url('uploads/profile_images/no_image.png')}}">

											</div>
										</div>
									</div>
									<div class="card-footer text-left">
										<button type="submit" class="btn btn-primary waves-effect waves-light">Update Profile</button>
									</div>
								</form>
							</div>
							
						</div>
					</div>
					<!-- /Col -->
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
		<script type="text/javascript">
			$(document).ready(function() {
			  $('#image').change(function(e){
				var reader = new FileReader();
				reader.onload = function(e){
				  $('#image_view').attr('src' , e.target.result);
				}
				reader.readAsDataURL(e.target.files['0']);
			  });
			});
			  </script>
			
@endsection
@section('js')
<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Internal Select2.min js -->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{URL::asset('assets/js/select2.js')}}"></script>
@endsection