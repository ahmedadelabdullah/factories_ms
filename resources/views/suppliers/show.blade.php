@extends('layouts.master')
@section('css')
<style>
	table, th, td {
  border: 1px solid #ecf0fa;
}
	</style>
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Utilities</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Display</span>
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
				<div class="row">
					<div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
						<!--div-->
						<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Basic Display
								</div>
								<p class="mg-b-20">It is Very Easy to Customize and it uses in website apllication.</p>
								<div class="table-responsive">
									<table class="table main-table-reference text-nowrap mb-0 mg-t-5">
										<thead>
											<tr>
												<th class="wd-30p">Class</th>
												<th class="wd-70p">Description</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>اسم العميل</td>
												<td>{{$customer->name}}</td>
											</tr>
											<tr>
												<td>رصيد مبدئي </td>
												<td>{{$customer->start_balance}}</td>
											</tr>
											<tr>
												<td>اجمالي الفواتير</td>
												<td>{{$invoices_sum}}</td>
											</tr>
											<tr>
												<td>اجمالي الدفعات</td>
												<td>{{$payments_sum}}</td>
											</tr>
											<tr>
												<td><code>اجمالي المرتجعات</code></td>
												<td><code>{{$returns_sum}}</code></td>
											</tr>
											<tr>
												<td>اجمالي الحساب</td>
												<td>{{$customer->start_balance + $invoices_sum - $payments_sum -$returns_sum}}</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!--/div-->

					<div class="col-xl-12">
						<div class="card mg-b-20">
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
												<th class="border-bottom-0">الرصيد</th>
												<th class="border-bottom-0">الدفعات </th>
												<th class="border-bottom-0">المرتجعات  </th>
												<th class="border-bottom-0">الخصم</th>
												<th class="border-bottom-0">الاضافة </th>
												<th class="border-bottom-0">الفواتير</th>
												<th class="border-bottom-0">التاريخ</th>
												<th class="border-bottom-0">البيان </th>
												<th class="border-bottom-0">العمليات</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td colspan="">1</td>
												<td >{{$customer->start_balance}}</td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td>{{date('y-m-d')}}</td>
												<td>  رصيد سابق  </td>
												<td> 
													<a  class="btn btn-primary text-white">تعديل</a>
												</td>
												
												
											</tr>
										<?php $balance = $customer->start_balance;?>
											@foreach ($customer->accounts as $row)
											@if ($row->mark == 0)
											<tr class="">
												<td>{{$loop->index + 1}}</td>
												<td>{{$balance = ($balance) + ($row->total_due_invoice)}}</td>												<td>{{($row->total_due_payment) === 0 ? '' : $row->total_due_payment}}</td>
												<td>{{''}}</td>
												<td>{{""}}</td>
												<td>{{""}}</td>
												<td>{{$row->total_due_invoice}}</td>
												<td> {{$row->date}} </td>
												<td> فاتورة {{$row->n_o_pieces}} ق 2 موديل</td>
										<td> 
											<a class="btn btn-primary text-white" href="{{route('customeraccounts.show' , $row->id)}}">تفاصيل</a>

											<a class="btn btn-primary text-white" href="{{route('customeraccounts.edit' , $row->id)}}">تعديل</a>
											<form  action="{{route('customeraccounts.destroy' , $row->id)}}" method="POST" style="display: inline-block">
												@csrf
												@method('DELETE')
												<button class="btn btn-danger" type="submit">حذف</button>
											</form>

										</td>
											</tr>
											@endif
											@if ($row->mark == 1)
											<tr class="">
												<td>{{$loop->index + 1}}</td>
												
												<td>{{$balance = ($balance) - ($row->total_due_return)}}</td>	
												<td>{{""}}</td>
												<td>{{$row->total_due_return}}</td>
												<td>{{""}}</td>
												<td>{{""}}</td>
												<td>{{""}}</td>
									
												<td> {{$row->date}} </td>
												<td> مرتجع {{$row->n_o_pieces}} ق 2 موديل</td>
										<td> 
											<a class="btn btn-primary text-white" href="{{route('customeraccounts.show' , $row->id)}}">تفاصيل</a>

											<a class="btn btn-primary text-white" href="{{route('customeraccounts.edit' , $row->id)}}">تعديل</a>
											<form  action="{{route('customeraccounts.destroy' , $row->id)}}" method="POST" style="display: inline-block">
												@csrf
												@method('DELETE')
												<button class="btn btn-danger" type="submit">حذف</button>
											</form>

										</td>
											</tr>
											@endif
											@if ($row->mark == 2)
											<tr class="">
												<td>{{$loop->index + 1}}</td>
												<td>{{$balance = ($balance) - ($row->total_due_payment)}}</td>	
												<td>{{$row->total_due_payment}}</td>
												<td>{{""}}</td>
												<td>{{""}}</td>
												<td>{{""}}</td>
												<td>{{$row->total_due_invoice === 0 ? '' : $row->total_due_invoice}}</td>
												<td> {{$row->date}} </td>
												<td>دفعة </td>
										<td> 
											<a class="btn btn-primary text-white" href="{{route('customeraccounts.show' , $row->id)}}">تفاصيل</a>

											<a class="btn btn-primary text-white" href="{{route('customeraccounts.edit' , $row->id)}}">تعديل</a>
											<form  action="{{route('customeraccounts.destroy' , $row->id)}}" method="POST" style="display: inline-block">
												@csrf
												@method('DELETE')
												<button class="btn btn-danger" type="submit">حذف</button>
											</form>

										</td>
											</tr>
										@endif
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>

				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
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