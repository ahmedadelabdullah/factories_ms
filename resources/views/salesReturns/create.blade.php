@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="{{asset('assets/css/pickadate/classic.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/pickadate/classic.date.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/pickadate/classic.time.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/pickadate/rtl.css')}}">
<style>
	.picker--opened{
		left: 0;
	}
	</style>
@endsection
@section('title')
 برنامج المنظومة || 	مرتجع جديد   
@endsection
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
<form action="{{route('sales_returns.store')}}" method="POST">
    @csrf
				<!-- row -->
				<div class="row row-sm">
					<div class="col-md-12 col-xl-12">
						<div class=" main-content-body-invoice">
							<div class="card card-invoice">
								<div class="card-body">
									<div class="invoice-header">
										<h1 class="invoice-title">Invoice</h1>
										<div class="billed-from">
											<h6>المرسل اليه</h6>
											<p>201 Something St., Something Town, YT 242, Country 6546<br>
											Tel No: 324 445-4544<br>
											Email: youremail@companyname.com</p>
										</div><!-- billed-from -->
									</div><!-- invoice-header -->
									<div class="row mg-t-20">
										<div class="col-md">
											<h6>المرسل</h6>
											<div class="billed-to">
												<select class="form-control" name="customer_id">
													<option>أختار عميل</option>
                                                @foreach($customers as $customer)
                                                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                                                @endforeach
												</select>
                                                <span class="text-danger">
                                                    @error('customer_id')
                                                        <span>{{$message}}
                                                     </span>
                                                    @enderror 
                                                 </span>
												<p>4033 Patterson Road, Staten Island, NY 10301<br>
												Tel No: 324 445-4544<br>
												Email: youremail@companyname.com</p>
											</div>
										</div>
										<div class="col-md">
											<label class="tx-gray-600">معلومات الفاتورة</label>
											<p class="invoice-info-row"><span>رقم الفاتورة</span> <span>
                                                <input type="number" name="invoice_number" class="form-control">
                                                <span class="text-danger">
                                               @error('invoice_number')
                                                   <span>{{$message}}
                                                </span>
                                               @enderror 
                                            </span>
                                        </p>
											<p class="invoice-info-row"><span>تاريخ الاصدار</span> <span>
                                                <input type="date" name="date" class="form-control pickadate" >
                                                <span class="text-danger">
                                                    @error('date')
                                                        <span>{{$message}}
                                                     </span>
                                                    @enderror 
                                                 </span>
                                            </span></p>
											<p class="invoice-info-row"><span>عدد القطع</span> <span>
                                                <input type="number" id="n_o_pieces" name="n_o_pieces" class="form-control" readonly>
                                                <span class="text-danger">
                                                    @error('n_o_pieces')
                                                        <span>{{$message}}
                                                     </span>
                                                    @enderror 
                                                 </span>
                                            </span></p>

											<p class="invoice-info-row"><span>الخصم للقطعة </span> <span>
                                                <input type="number" id="sale_per_piece" name="sale_per_piece" class="form-control">
                                                <span class="text-danger">
                                                    @error('n_o_pieces')
                                                        <span>{{$message}}
                                                     </span>
                                                    @enderror 
                                                 </span>
                                            </span></p>


										</div>
									</div>
									<div class="table-responsive mg-t-40">
										<table class="table table-invoice border text-md-nowrap mb-0 invoice_details">
											<thead>
												<tr>
													<th class="wd-10p">#</th>
													<th class="tx-center wd-10p">الكمية</th>
													<th class="wd-35p">وصف الموديل </th>
													<th class="wd-10p">السعر</th>
													<th class="tx-right">المبلغ</th>
												</tr>
											</thead>
											<tbody>
												<tr class="cloning-row" id="0">
													<td>1</td>
													<td class="tx-12">
														<input type="number" name="quantity[]" id="quantity" class="form-control quantity">
														@error('quantity')
                                                        <span>{{$message}}
                                                     </span>
                                                    @enderror 
													</td>
													<td class="tx-right">
														<select class="form-control"  id="product" name="product_name[]">
														<option>اختر موديل</option>
														@foreach($products as $product)
														<option value="{{$product->product_name}}">{{$product->product_name}}</option>
														@endforeach
														</select>
																												@error('quantity')
                                                        <span>{{$message}}
                                                     </span>
                                                    @enderror 
													</td>
													<td class="tx-center">
														<input type="number"  id="price" name="price[]" class="form-control price">
														@error('price')
														<span>{{$message}}</span>
                                                        @enderror
													</td>
													<td class="tx-right">
														<input type="number" step="5" id="row_sub_total" name="row_sub_total[]" class="form-control row_sub_total" readonly>
													</td>

													<td class="tx-right"><button  class="btn btn-danger">حذف</td>
												</tr>
											</tbody>
											<tfoot>		
												<tr>
													<td colspan="5">
												</td>
													<td colspan="">
															<button  class="btn btn-primary add_btn" type="button">اضافة منتج</button>
													</td>
												</tr>		

				<tr>
					<td class="valign-middle" colspan="3" rowspan="4">
						<div class="invoice-notes">
							<label class="main-content-label tx-13">Notes</label>
						</div><!-- invoice-notes -->
					</td>
					<td class="tx-right">Sub-Total</td>
					<td class="tx-right sub_total"  colspan="2">
						{{-- سعر الفاتورة قبل الخصم --}}
						<input type="number" name="sub_total" id="sub_total" class="form-control" readonly></td>
				</tr>
				<tr>
					<td class="tx-right">sale</td>
					<td class="tx-right sub_total"  colspan="2">
{{--  الخصم وهو حاصل ضرب عدد القطع فى مبلغ الخصم للوحدة --}}
						<input type="number" id="sale_amount" name="sale_amount" class="form-control" readonly></td>
				</tr>
				<tr>
					<td class="tx-right">Discount</td>
					{{-- الخصم لو وجد خصم عام على الفاتورة --}}
					<td class="tx-right" colspan="2"><input type="number" name="discount" id="discount" class="form-control"></td>
				</tr>
				<tr>
					<td class="tx-right tx-uppercase tx-bold tx-inverse">Total Due</td>
					<td class="tx-right" colspan="2">
						{{-- المبلغ المستحق --}}
						<input type="number" name="total_due" id="total_due" class="form-control" readonly>
					</td>
				</tr>
											</tfoot>
		</table>
									</div>
									<hr class="mg-b-40">
									<a class="btn btn-purple float-left mt-3 mr-2" href="">
										<i class="mdi mdi-currency-usd ml-1"></i>Pay Now
									</a>
									<a href="#" class="btn btn-danger float-left mt-3 mr-2">
										<i class="mdi mdi-printer ml-1"></i>Print
									</a>
									<a href="#" class="btn btn-success float-left mt-3">
										<i class="mdi mdi-telegram ml-1"></i>Send Invoice
									</a>
                                    <button class="btn btn-primary" type="submit">حفظ الفاتورة</button>
									
								</div>
							</div>
						</div>
					</div><!-- COL-END -->
				</div>
				<!-- row closed -->
      </form>
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
{{-- <script src="{{URL::asset('assets/js/pickadate/picker.date.js')}}"></script> --}}
<script src="{{asset('assets/js/pickadate/picker.js')}}"></script>
<script src="{{asset('assets/js/pickadate/picker.date.js')}}"></script>
<script src="{{asset('assets/js/pickadate/ar.js')}}"></script>


<script>
	$(document).ready(function() {
		$('.pickadate').pickadate({
			format: 'yyyy-mm-dd',
			max: 1,
			disable: [
    1
  ],

		});

		$('.main-content-body-invoice').on('keyup blur' ,'#sale_per_piece' ,  function(){
			var row = $(this).closest('tr');
			var quantity = row.find('.quantity').val() || 0;
			var price = row.find('.price').val() || 0;
			var partial_amount = quantity * price;
			row.find('.row_sub_total').val((partial_amount).toFixed(0));
				var sub_total = $('#sub_total').val(sum_total('.row_sub_total')).val();
				var n_o_pieces = $('#n_o_pieces').val(sum_total('.quantity'));
			var discount = $('#discount').val() || 0 ;

			var sale_per_piece = $('#sale_per_piece').val() || 0 ;
			var quantities = sum_total('.quantity') || 0 ;
			var sale_amount = $('#sale_amount').val(sale_per_piece * quantities).val();
			$('#total_due').val(sub_total - sale_amount - discount);
		});

		$('.main-content-body-invoice').on('keyup blur' ,'#discount' ,  function(){
			var row = $(this).closest('tr');
			var quantity = row.find('.quantity').val() || 0;
			var price = row.find('.price').val() || 0;
			var partial_amount = quantity * price;
			row.find('.row_sub_total').val((partial_amount).toFixed(0));
				var sub_total = $('#sub_total').val(sum_total('.row_sub_total')).val();
				var n_o_pieces = $('#n_o_pieces').val(sum_total('.quantity'));
			var discount = $('#discount').val() || 0 ;

			var sale_per_piece = $('#sale_per_piece').val() || 0 ;
			var quantities = sum_total('.quantity') || 0 ;
			var sale_amount = $('#sale_amount').val(sale_per_piece * quantities).val();
			$('#total_due').val(sub_total - sale_amount - discount);
		});

        $('.invoice_details').on('keyup blur' , '.quantity' , function(){
			var row = $(this).closest('tr');
			var quantity = row.find('.quantity').val() || 0;
			var price = row.find('.price').val() || 0;
			var partial_amount = quantity * price;
			row.find('.row_sub_total').val((partial_amount).toFixed(0));
				var sub_total = $('#sub_total').val(sum_total('.row_sub_total')).val();
				var n_o_pieces = $('#n_o_pieces').val(sum_total('.quantity'));

				var discount = $('#discount').val() || 0 ;

			var sale_per_piece = $('#sale_per_piece').val() || 0 ;
			var quantities = sum_total('.quantity') || 0 ;
			var sale_amount = $('#sale_amount').val(sale_per_piece * quantities).val();
						$('#total_due').val(sub_total - sale_amount - discount);


		});

		$('.invoice_details').on('keyup blur' , '.price' , function(){
			var row = $(this).closest('tr');
			var quantity = row.find('.quantity').val() || 0;
			var price = row.find('.price').val() || 0;
			var partial_amount = quantity * price;
			row.find('.row_sub_total').val((partial_amount).toFixed(0));
				var sub_total = $('#sub_total').val(sum_total('.row_sub_total')).val();
				var n_o_pieces = $('#n_o_pieces').val(sum_total('.quantity'));

				var discount = $('#discount').val() || 0 ;

			var sale_per_piece = $('#sale_per_piece').val() || 0 ;
			var quantities = sum_total('.quantity') || 0 ;
			var sale_amount = $('#sale_amount').val(sale_per_piece * quantities).val();
						$('#total_due').val(sub_total - sale_amount - discount);
		});

		let sum_total = function ($selector){
			let total = 0;
            $($selector).each(function(){
				let selecVal = $(this).val() != '' ? $(this).val() : 0;
                total += parseFloat(selecVal);
            });
            return total;
        }

		$(document).on('click' , '.add_btn' , function(){
			var trCount = $('.invoice_details').find('tr.cloning-row:last').length;
			var numberIncrement = trCount > 0 ? parseInt($('.invoice_details').find('tr.cloning-row:last').attr('id')) + 1 : 0;
			
			$('.invoice_details').find('tbody').append(`
			
			<tr class="cloning-row" id="` + numberIncrement +`">
													<td>` + (numberIncrement+1) + `</td>
													<td class="tx-12">
														<input type="number" name="quantity[]" id="quantity" class="form-control quantity">
													</td>
													<td class="tx-right">
														<select class="form-control"  id="product" name="product_name[]">
														<option>اختر موديل</option>
														@foreach($products as $product)
														<option value="{{$product->product_name}}">{{$product->product_name}}</option>
														@endforeach

														</select>
													</td>
													<td class="tx-center">
														<input type="number" step="5" id="price" name="price[]" class="form-control price">
													</td>
													<td class="tx-right">
														<input type="number" step="5" id="row_sub_total" name="row_sub_total[]" class="form-control row_sub_total" readonly>
													</td>

													<td class="tx-right"><button  class="btn btn-danger delete-row">حذف</td>
												</tr>
			`);
		});

		$('.invoice_details').on('click' , '.delete-row' , function(e){

e.preventDefault();
$(this).parent().parent().remove();



			var row = $(this).closest('tr');
			var quantity = row.find('.quantity').val() || 0;
			var price = row.find('.price').val() || 0;
			var partial_amount = quantity * price;
			row.find('.row_sub_total').val((partial_amount).toFixed(0));
				var sub_total = $('#sub_total').val(sum_total('.row_sub_total')).val();
				var n_o_pieces = $('#n_o_pieces').val(sum_total('.quantity'));

				var discount = $('#discount').val() || 0 ;

			var sale_per_piece = $('#sale_per_piece').val() || 0 ;
			var quantities = sum_total('.quantity') || 0 ;
			var sale_amount = $('#sale_amount').val(sale_per_piece * quantities).val();
						$('#total_due').val(sub_total - sale_amount - discount);
		});
    });
</script>
<!--Internal  Chart.bundle js -->
<script src="{{URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
@endsection