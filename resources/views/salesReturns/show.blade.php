@extends('layouts.master')
@section('css')
@endsection
@section('title')
 برنامج المنظومة || 	 عرض مرتجع   
@endsection
{{-- @dd($customerInvoice->details()); --}}
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Invoice</span>
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
					<div class="col-md-12 col-xl-12">
						<div class=" main-content-body-invoice">
							<div class="card card-invoice">
								<div class="card-body">
									<div class="invoice-header">
										<h1 class="invoice-title">فاتورة {{$salesReturn->invoice_number}} </h1>
										<div class="billed-from">
											<h6>BootstrapDash, Inc.</h6>
											<p>201 Something St., Something Town, YT 242, Country 6546<br>
											Tel No: 324 445-4544<br>
											Email: youremail@companyname.com</p>
										</div><!-- billed-from -->
									</div><!-- invoice-header -->
									<div class="row mg-t-20">
										<div class="col-md">
											<label class="tx-gray-600">المرسل اليه</label>
											<div class="billed-to">
												<h6>{{$salesReturn->customer->name}}</h6>
												<p>4033 Patterson Road, Staten Island, NY 10301<br>
												Tel No: 324 445-4544<br>
												Email: youremail@companyname.com</p>
											</div>
										</div>
										<div class="col-md">
											<label class="tx-gray-600">معلومات الفاتورة</label>
											<p class="invoice-info-row"><span>رقم الفاتورة</span> <span>{{$salesReturn->invoice_number}}</span></p>
											<p class="invoice-info-row"><span>تاريخ الاصدار</span> <span>{{$salesReturn->date}}</span></p>
											<p class="invoice-info-row"><span>عدد القطع</span> <span>{{$salesReturn->n_o_pieces}}</span></p>
											<p class="invoice-info-row"><span>الخصم للقطعة </span> <span>{{$salesReturn->sale_per_piece}}</span></p>

										</div>
									</div>
									<div class="table-responsive mg-t-40" >
										<table class="table table-invoice border text-md-nowrap mb-0">
											<thead>
												<tr>
													<th class="wd-10p">#</th>
													<th class="tx-center wd-10p">الكمية</th>
													<th class="wd-35p tx-center">وصف الموديل</th>
													<th class="wd-10p tx-center">السعر</th>
													<th class="tx-center">المبلغ</th>
												</tr>
											</thead>
											<tbody>
												@foreach ($salesReturn->details as $item)
												<tr>
													<td>{{$loop->iteration}}</td>
													<td class="tx-12 tx-center">{{$item->quantity}}</td>
													<td class="tx-12 tx-center">{{$item->product_name}}</td>
													<td class="tx-center tx-center">{{$item->price}}</td>
													<td class="tx-center">{{$item->row_sub_total}}</td>
												</tr>
												@endforeach
												<tr>
													<td class="valign-middle" colspan="3" rowspan="4">
														<div class="invoice-notes">
															<label class="main-content-label tx-13">ملاحظات</label>
															<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
														</div><!-- invoice-notes -->
													</td>
													<td class="tx-right wd-20p main-content-label">السعر الجزئي</td>
													<td class="tx-center" colspan="2">{{$salesReturn->sub_total}}</td>
												</tr>
												@if ($salesReturn->sale_amount)
												<tr>
													<td class="tx-right wd-20p main-content-label">الخصم على القطع</td>
													<td class="tx-center" colspan="2">{{$salesReturn->sale_amount}}</td>
												</tr>
												@endif
												
											@if ($salesReturn->discount)
											<tr>
												<td class="tx-right main-content-label">خصم عام على الفاتورة</td>
												<td class="tx-center" colspan="2">{{$salesReturn->discount}}</td>
											</tr>
											@endif
													<tr>
														<td class="tx-right tx-uppercase tx-bold tx-inverse main-content-label">السعر النهائي</td>
														<td class="tx-center" colspan="2">
															<h4 class="tx-primary tx-bold ">{{$salesReturn->total_due_return}}</h4>
														</td>
													</tr>
											</tbody>
										</table>
									</div>
									<hr class="mg-b-40">
									<a href="{{url('invoice/pdf' , $salesReturn->id)}}"  class="btn btn-purple float-left mt-3 mr-2" href="">
										pdf
									</a>
									<a href="{{url('invoice/print' , $salesReturn->id)}}" class="btn btn-danger float-left mt-3 mr-2">
										<i class="mdi mdi-printer ml-1"></i>Print
									</a>
									<a href="#" class="btn btn-success float-left mt-3">
										<i class="mdi mdi-telegram ml-1"></i>Send Invoice
									</a>
								</div>
							</div>
						</div>
					</div><!-- COL-END -->
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!--Internal  Chart.bundle js -->
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