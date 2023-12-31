@extends('layouts.master')
@section('title')
 برنامج المنظومة || 	العملاء  
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
										<a class="modal-effect btn btn-primary " data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">اضافة عميل جديد</a>
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
												<th class="border-bottom-0">موبايل</th>
												<th class="border-bottom-0">العنوان </th>
												<th class="border-bottom-0">الرصيد الحالى </th>
												<th class="border-bottom-0">الحالة</th>
												<th class="border-bottom-0">العمليات</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 0 ;?>
											@foreach ($customers as $customer)
											<tr class="">
												<td>{{$loop->index + 1}}</td>
												<td><a href="{{route('customers.show' , $customer->id)}}">{{$customer->name}}</a></td>
												<td>{{$customer->phone}}</td>
												<td>{{$customer->address}}</td>
												{{-- <td>{{$user->user_name}}</td> --}}
												
												{{-- <td><img src="{{(!empty($user->photo)) ? url('uploads/profile_images/'.$user->photo) : url('uploads/profile_images/no_image.png')}}" style="width: 50px"></td> --}}
												<td>{{$customer->current_balance}}</td>
												<td>{{$customer->status}}</td>
												
												<td>
													<a class="modal-effect btn btn-primary user-dialog" 
													data-id="{{$customer->id}}" 
													data-name="{{$customer->name}}" 
													data-phone="{{$customer->phone}}"  
													data-owner="{{$customer->owner}}" 
													data-address="{{$customer->address}}"
													
													data-effect="effect-scale" data-toggle="modal" href="#modaldemo1">تعديل</a>
													<a class="modal-effect btn btn-danger user-dialog" data-id="{{$customer->id}}" data-name="{{$customer->name}}" data-effect="effect-scale" data-toggle="modal" href="#modaldemo2">حذف</a>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="modal" id="modaldemo1">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content modal-content-demo">
								<div class="modal-header">
									<h6 class="modal-title">  تعديل</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
								</div>
								<div class="modal-body">
									<form action="{{route('customers.update' , $customer->id)}}" method="POST">
										@csrf
										@method('PUT')
										<div class="row">
											<input type="hidden" name="id" id="id" class="form-control" aria-describedby="emailHelp">

										<div class="mb-3 col-md-12">
										  <label for="name" class="form-label">الاسم</label>
										  <input type="text" name="name" id="name" class="form-control" id="name" aria-describedby="emailHelp">
										</div>

										  <div class="mb-3 col-md-6">
											<label for="phone" class="form-label">موبايل </label>
											<input type="number" name="phone" id="phone" placeholder="موبايل" class="form-control" id="phone" aria-describedby="emailHelp">
										  </div>

										  <div class="mb-3 col-md-6">
											<label for="address" class="form-label">العنوان </label>
											<input type="text" name="address" id="address" placeholder="العنوان" class="form-control" id="address" aria-describedby="emailHelp">
										  </div>

										  <div class="mb-3 col-md-6">
											<label for="address" class="form-label">الرصيد الابتدائي </label>
											<input type="number" name="start_balance" id="address" placeholder="الرصيد الابتدائي " class="form-control" id="address" aria-describedby="emailHelp">
										  </div>
									</div>
									<div class="modal-footer">
										<button class="btn ripple btn-primary" type="submit">حفظ</button>
										<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">اغلاق</button>
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
									<h6 class="modal-title">اضافة عميل جديد</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
								</div>
								<div class="modal-body">
									<form action="{{route('customers.store')}}" method="POST">
										@csrf
										<div class="row">
										<div class="mb-3 col-md-12">
										  <label for="name" class="form-label">الاسم</label>
										  <input type="text" name="name" placeholder="الاسم" class="form-control" id="name" aria-describedby="emailHelp">
										</div>
								

										  <div class="mb-3 col-md-6">
											<label for="phone" class="form-label">موبايل </label>
											<input type="number" name="phone" placeholder="موبايل" class="form-control" id="phone" aria-describedby="emailHelp">
										  </div>

										  <div class="mb-3 col-md-6">
											<label for="address" class="form-label">العنوان </label>
											<input type="text" name="address" placeholder="العنوان" class="form-control" id="address" aria-describedby="emailHelp">
										  </div>

										  <div class="mb-3 col-md-12">
											<label for="address" class="form-label">الرصيد الابتدائي </label>
											<input type="text" name="start_balance" placeholder="الرصيد الابتدائي " class="form-control" id="address" aria-describedby="emailHelp">
										  </div>
										
									</div>
									<div class="modal-footer">
										<button class="btn ripple btn-primary" type="submit">حفظ</button>
										<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">اغلاق</button>
									</div>
									  </form>		
												</div>
						
							</div>
						</div>
					</div>

					<div class="modal" id="modaldemo2">
						<form class="modal-dialog" action="{{route('customers.destroy' , $customer->id)}}" method="POST">
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
								<p>هل انت متأكد من حذف مكتب <span id="deletedName"></span></p>
							  </div>
							  <div class="modal-footer">
								<button type="submit" class="btn btn-danger">حذف</button>

								<button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
							  </div>
							</div>
						  </form>
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
	
		var owner = $(this).data('owner');
		$("#modaldemo1 #owner").val( owner );

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