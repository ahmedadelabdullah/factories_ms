@extends('layouts.master')
@section('title')
 برنامج المنظومة || 	فواتير العملاء  
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
										<a class="btn btn-primary"  href="{{route('customerinvoices.create')}}">اضافة فاتورة عميل</a>
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
												<th class="border-bottom-0"> الفاتورة</th>
												<th class="border-bottom-0">العميل</th>
												<th class="border-bottom-0"> القطع</th>
												<th class="border-bottom-0">التاريخ </th>
		
												<th class="border-bottom-0"> المبلغ الكلي</th>
												<th class="border-bottom-0">العمليات</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 0 ;?>
											@foreach ($customer_invoices as $customer_invoice)
											<?php $i ++ ;?>
											<tr class="">
												<td>{{$i}}</td>
												<td>{{$customer_invoice->invoice_number}}</td>
												{{-- <td>{{$user->user_name}}</td> --}}
												<td>{{$customer_invoice->cumtomer_id}}</td>
												
												<td>{{$customer_invoice->n_o_pieces}}</td>
												{{-- <td><img src="{{(!empty($user->photo)) ? url('uploads/profile_images/'.$user->photo) : url('uploads/profile_images/no_image.png')}}" style="width: 50px"></td> --}}
												<td>{{$customer_invoice->date}}</td>
									
												<td>{{$customer_invoice->total_amount}}</td>
												
												<td>
													<a class="modal-effect btn btn-primary user-dialog" data-id="{{$customer_invoice->id}}" data-name="{{$customer_invoice->name}}" data-effect="effect-scale" data-toggle="modal" href="#modaldemo2">تفاصيل</a>

													<a class="modal-effect btn btn-primary user-dialog" 
													data-id="{{$customer_invoice->id}}" 
													data-name="{{$customer_invoice->name}}" 
													data-phone="{{$customer_invoice->phone}}"  
													data-email="{{$customer_invoice->email}}" 
													data-com_code="{{$customer_invoice->com_code}}"
													data-address="{{$customer_invoice->address}}"
													data-role="{{$customer_invoice->role}}"
													data-user_name="{{$customer_invoice->user_name}}"
													
													data-effect="effect-scale" data-toggle="modal" href="#modaldemo1">تعديل</a>
													<a class="modal-effect btn btn-danger user-dialog" data-id="{{$customer_invoice->id}}" data-name="{{$customer_invoice->name}}" data-effect="effect-scale" data-toggle="modal" href="#modaldemo2">حذف</a>

												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
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