@extends('layouts.master')
@section('title')
 برنامج المنظومة || 	المنتجات  
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
										<a class="modal-effect btn btn-primary " data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">اضافة منتج جديد</a>
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
												<th class="border-bottom-0">اسم الموديل</th>
												<th class="border-bottom-0">سعر الموديل</th>
												<th class="border-bottom-0">صورة الموديل </th>
												<th class="border-bottom-0">العمليات</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 0 ;?>
											@foreach ($products as $product)
											<?php $i ++ ;?>
											<tr class="">
												<td>{{$i}}</td>
												<td>{{$product->product_name}}</td>
												{{-- <td>{{$user->user_name}}</td> --}}
												<td>{{$product->product_price}}</td>
												
												<td><img src="{{(!empty($product->product_image)) ? url('uploads/product_images/'.$product->product_image) : url('uploads/product_images/no_image.png')}}" style="width: 50px"></td>
												
												<td>
													<a class="modal-effect btn btn-primary user-dialog" 
													data-id="{{$product->id}}" 
													data-product_name="{{$product->product_name}}" 
													data-product_price="{{$product->product_price}}"  
													data-product_image="{{$product->product_image}}" 
							
													
													data-effect="effect-scale" data-toggle="modal" href="#modaldemo1">تعديل</a>
													<a class="modal-effect btn btn-danger user-dialog" data-id="{{$product->id}}" data-name="{{$product->product_name}}" data-effect="effect-scale" data-toggle="modal" href="#modaldemo2">حذف</a>

												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

					{{-- delete modAL --}}
					<div class="modal" id="modaldemo2">
						<form class="modal-dialog" action="{{route('products.destroy' , $product->id)}}" method="POST">
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
					{{-- delete modAL --}}

					{{-- edit modaL --}}
					<div class="modal" id="modaldemo1">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content modal-content-demo">
								<div class="modal-header">
									<h6 class="modal-title">  تعديل</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
								</div>
								<div class="modal-body">
									<form action="{{route('products.update' , $product->id)}}" method="POST" enctype="multipart/form-data">
										@csrf
										@method('PUT')
										<div class="row">
			
												<input type="hidden" name="id" id=id>
											
										<div class="mb-3 col-md-12">
										  <label  class="form-label">الاسم</label>
										  <input type="text" name="product_name" id="product_name"  class="form-control"  aria-describedby="emailHelp">
										</div>
			
										<div class="mb-3 col-md-12">
											<label  class="form-label">السعر</label>
											<input type="text" name="product_price" id="product_price"  class="form-control"  aria-describedby="emailHelp">
										  </div>

										  <div class="mb-3 col-md-12">
											<label  class="form-label">الصورة</label>
											<input type="file" name="photo" id="photo"  class="form-control"  aria-describedby="emailHelp">
										  </div>
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
{{-- edit modaL --}}
{{-- add modaL --}}

					<div class="modal" id="modaldemo8">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content modal-content-demo">
								<div class="modal-header">
									<h6 class="modal-title">اضافة موديل جديد</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
								</div>
								<div class="modal-body">
									<form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
										@csrf
										<div class="row">
										<div class="mb-3 col-md-6">
										  <label  class="form-label">اسم الموديل</label>
										  <input type="name" name="product_name" placeholder="اسم الموديل" class="form-control"  aria-describedby="emailHelp">
										</div>
										<div class="mb-3 col-md-6">
											<label  class="form-label">سعر الموديل</label>
											<input type="user_name" name="product_price" placeholder="سعر الموديل" class="form-control"  aria-describedby="emailHelp">
										  </div>
										
										  <div class="mb-3 col-md-12">
											<label  class="form-label">صورة الموديل </label>
											<input type="file" name="photo" placeholder="صورة الموديل " class="form-control"  aria-describedby="emailHelp">
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

					{{-- add modaL --}}
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

		var product_name = $(this).data('product_name');
		
    	 $("#modaldemo1 #product_name").val( product_name );
	
		var product_price = $(this).data('product_price');
		$("#modaldemo1 #product_price").val( product_price );

		var id = $(this).data('id');
    	$("#modaldemo2 #id").val( id );
		
		var name = $(this).data('name');
		$("#modaldemo2 #id").val( id );
		document.getElementById("deletedName").innerHTML = name;
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