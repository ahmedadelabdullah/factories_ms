@extends('layouts.master')
@section('title')
 برنامج المنظومة || 	المسؤلون  
@endsection
@section('css')
<!--  Owl-carousel css-->
<link href="{{URL::asset('assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
<!-- Maps css -->
<link href="{{URL::asset('assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="row">
					<div class="col-xl-12">
						<div class="card mg-b-20">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<div class="col-sm-6 col-md-4 col-xl-3">
										<a class="modal-effect btn btn-primary " data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">اضافة مسؤل جديد</a>
									</div>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table key-buttons text-md-nowrap w-100">
										@if(session('success'))
										<div class="alert alert-success" id="alert-success">
										{{session('success')}}
									  </div>
									  @endif

									  @if(session('delete'))
									  <div class="alert alert-danger">
									  {{session('delete')}}
									</div>
									@endif

									@if(session('adding'))
									<div class="alert alert-success">
									{{session('adding')}}
								  </div>
								  @endif
										<thead>
											<tr>
												<th class="border-bottom-0">#</th>
												<th class="border-bottom-0">الاسم</th>
												{{-- <th class="border-bottom-0">اسم المستخدم</th> --}}
												<th class="border-bottom-0">موبايل</th>
												<th class="border-bottom-0">البريد الالكتروني</th>
												<th class="border-bottom-0">الحالة</th>
												<th class="border-bottom-0">العمليات</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 0 ;?>
											@foreach ($users as $user)
											<?php $i ++ ;?>
											<tr class="">
												<td>{{$i}}</td>
												<td>{{$user->name}}</td>
												{{-- <td>{{$user->user_name}}</td> --}}
												<td>{{$user->phone}}</td>
												
												<td>{{$user->email}}</td>
												{{-- <td><img src="{{(!empty($user->photo)) ? url('uploads/profile_images/'.$user->photo) : url('uploads/profile_images/no_image.png')}}" style="width: 50px"></td> --}}
												<td>{{$user->status}}</td>
												
												<td>
													<a class="modal-effect btn btn-primary user-dialog" 
													data-id="{{$user->id}}" 
													data-name="{{$user->name}}" 
													data-phone="{{$user->phone}}"  
													data-email="{{$user->email}}" 
													data-com_code="{{$user->com_code}}"
													data-address="{{$user->address}}"
													data-role="{{$user->role}}"
													data-user_name="{{$user->user_name}}"
													
													data-effect="effect-scale" data-toggle="modal" href="#modaldemo1">تعديل</a>
													<a class="modal-effect btn btn-danger user-dialog" data-id="{{$user->id}}" data-name="{{$user->name}}" data-effect="effect-scale" data-toggle="modal" href="#modaldemo2">حذف</a>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="modal" id="modaldemo2">
						<form class="modal-dialog" action="{{route('admin.admins.destroy' , $user->id)}}" method="POST">
							@csrf
							@method('DELETE')
							<div class="modal-content">
							  <div class="modal-header">
								<h5 class="modal-title">حذف مسؤل</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								  <span aria-hidden="true">&times;</span>
								</button>
							  </div>
							  <input type="hidden" id="id" name="id">
							  <div class="modal-body">
								<p>هل انت متأكد من حذف المسؤل <span id="deletedName"></span></p>
							  </div>
							  <div class="modal-footer">
								<button type="submit" class="btn btn-danger">حذف</button>

								<button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
							  </div>
							</div>
						  </form>
					</div>
					<div class="modal" id="modaldemo1">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content modal-content-demo">
								<div class="modal-header">
									<h6 class="modal-title">  تعديل</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
								</div>
								<div class="modal-body">
									<form action="{{route('admin.admins.update' , $user->id)}}" method="POST">
										@csrf
										@method('PUT')
										<div class="row">
			
												<input type="hidden" name="id" id=id>
											
										<div class="mb-3 col-md-12">
										  <label for="exampleInputEmail1" class="form-label">الاسم</label>
										  <input type="text" name="name" id="name" placeholder="الاسم" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
										</div>
			
										{{-- <label for="exampleInputEmail1" class="form-label">اسم المستخدم</label> --}}
										 <input type="hidden" name="user_name" id="user_name" placeholder="الاسم" class="form-control">
								
										
											{{-- <label for="exampleInputEmail1" class="form-label">كود الشركة</label> --}}
											<input type="hidden" name="com_code" id="com_code" placeholder="الاسم" class="form-control">
										  
			
										  
											{{-- <label for="exampleInputEmail1" class="form-label">العنوان</label> --}}
											<input type="hidden" name="address" id="address" placeholder="الاسم" class="form-control">
										  
			
										  
											{{-- <label for="exampleInputEmail1" class="form-label">رول</label> --}}
											<input type="hidden" name="role" id="role" placeholder="الاسم" class="form-control" >
										  
										  <div class="mb-3 col-md-6">
											<label for="exampleInputEmail1" class="form-label">موبايل </label>
											<input type="name" name="phone" id="phone" placeholder="موبايل" class="form-control"  aria-describedby="emailHelp">
										  </div>
										  <div class="mb-3 col-md-6">
											<label for="exampleInputEmail1" class="form-label">البريد الالكتروني </label>
											<input type="email" name="email" id="email" placeholder="البريد الالكتروني"  class="form-control"  aria-describedby="emailHelp">
										  </div>
									</div>
									
									<div class="modal-footer">
										<button class="btn ripple btn-primary" type="submit">Save changes</button>
										<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
									</div>
									  </form>		
												</div>
						
							</div>
						</div>
					</div>

					<div class="modal" id="modaldemo8">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content modal-content-demo">
								<div class="modal-header">
									<h6 class="modal-title">اضافة مسؤل جديد</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
								</div>
								<div class="modal-body">
									<form action="{{route('admin.admins.store')}}" method="POST">
										@csrf
										<div class="row">
										<div class="mb-3 col-md-6">
										  <label for="exampleInputEmail1" class="form-label">الاسم</label>
										  <input type="name" name="name" placeholder="الاسم" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
										</div>
										<div class="mb-3 col-md-6">
											<label for="exampleInputEmail1" class="form-label">اسم المستخدم</label>
											<input type="user_name" name="user_name" placeholder="اسم المستخدم" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
										  </div>
										  <div class="mb-3 col-md-12">
											<label for="exampleInputEmail1" class="form-label">العنوان </label>
											<input type="user_name" name="address" placeholder="العنوان" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
										  </div>
										  <div class="mb-3 col-md-12">
											<label for="exampleInputEmail1" class="form-label">موبايل </label>
											<input type="user_name" name="phone" placeholder="موبايل" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
										  </div>
										  <div class="mb-3 col-md-12">
											<label for="exampleInputEmail1" class="form-label">البريد الالكتروني </label>
											<input type="email" name="email" placeholder="البريد الالكتروني " class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
										  </div>
									</div>
									<div class="modal-footer">
										<button class="btn ripple btn-primary" type="submit">Save changes</button>
										<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
									</div>
									  </form>		
												</div>
						
							</div>
						</div>
					</div>
				</div>
				</div>
				<!-- /row -->
			</div>
		</div>

	
		<!-- Container closed -->
@endsection
@section('js')
<script>
	$(document).on("click", ".user-dialog", function () 
	{
		var id = $(this).data('id');
    	 $("#modaldemo1 #id").val( id );

		var name = $(this).data('name');
    	 $("#modaldemo1 #name").val( name );
	
		var user_name = $(this).data('user_name');
		$("#modaldemo1 #user_name").val( user_name );

		var phone = $(this).data('phone');
		$("#modaldemo1 #phone").val( phone );

		var email = $(this).data('email');
		$("#modaldemo1 #email").val( email );

		var com_code = $(this).data('com_code');
		$("#modaldemo1 #com_code").val( com_code );

		var address = $(this).data('address');
		$("#modaldemo1 #address").val( address );

		var role = $(this).data('role');
		$("#modaldemo1 #role").val( role );

		var id = $(this).data('id');
    	$("#modaldemo2 #id").val( id );
		
		var name = $(this).data('name');
		$("#modaldemo2 #id").val( id );
		document.getElementById("deletedName").innerHTML = name;

		// $('.alert-success').fadeIn().delay(5000).fadeOut();

		$('#alert-success').hide();


});

</script>
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
<script src="{{URL::asset('assets/js/modal.js')}}"></script>

@endsection