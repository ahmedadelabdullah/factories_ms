<?php

namespace App\Http\Controllers;

use App\Models\SalesReturn;
use App\Models\Customer;
use App\Models\Product;
use App\Models\CustomersAccount;
use App\Http\Requests\StoreSalesReturnRequest;
use App\Http\Requests\UpdateSalesReturnRequest;

class SalesReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer_returns = CustomersAccount::where('mark' , '1')->get();
        return view('salesReturns.index' , compact('customer_returns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('salesReturns.create' , compact('customers' , 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSalesReturnRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSalesReturnRequest $request)
    {
        // return $request;
        $data = [];
        $data['customer_id'] = $request->customer_id;
        $data['invoice_number'] = $request->invoice_number;
        $data['date'] = $request->date_submit;
        $data['n_o_pieces'] = $request->n_o_pieces;
        $data['sale_per_piece'] = $request->sale_per_piece;
        $data['n_o_models'] = $request->n_o_models;
        $data['recipient'] = $request->recipient;
        $data['sub_total'] = $request->sub_total;
        $data['mark'] = 1;
        $data['sale_amount'] = $request->sale_amount;
        $data['discount'] = $request->discount;
        $data['total_due_return'] = $request->total_due_return;
        $salesReturn =  CustomersAccount::create($data);
// dd($salesReturn);
        $details_list = [];
        for($i=0 ; $i < count($request->product_name) ; $i++)
        {
            $details_list[$i]['product_name'] = $request->product_name[$i];
            $details_list[$i]['quantity'] = $request->quantity[$i];
            $details_list[$i]['price'] = $request->price[$i];
            $details_list[$i]['row_sub_total'] = $request->row_sub_total[$i];
        }
        // dd($details_list);
        $details =  $salesReturn->details()->createMany($details_list);
        return redirect()->route('sales_returns.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SalesReturn  $salesReturn
     * @return \Illuminate\Http\Response
     */
    public function show($salesReturn)
    {
        $salesReturn = CustomersAccount::findOrFail($salesReturn);
        $customers = Customer::all();
        return view('salesReturns.show', compact('salesReturn' , 'customers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalesReturn  $salesReturn
     * @return \Illuminate\Http\Response
     */
    public function edit($salesReturn)
    {
        $customers = Customer::all();
        $products = Product::all();
                $invoice = CustomersAccount::find($salesReturn);
                // dd($invoice);
        return view('salesReturns.edit' , compact('customers' , 'products' , 'invoice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSalesReturnRequest  $request
     * @param  \App\Models\SalesReturn  $salesReturn
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSalesReturnRequest $request,$salesReturn)
    {
        // return $request;
        $invoice = CustomersAccount::findOrFail($salesReturn);

        $data['customer_id'] = $request->customer;
        $data['invoice_number'] = $request->invoice_number;
        $data['date'] = $request->date_submit;
        $data['n_o_pieces'] = $request->n_o_pieces;
        $data['sale_per_piece'] = $request->sale_per_piece;
        $data['n_o_models'] = $request->n_o_models;
        $data['recipient'] = $request->recipient;
        $data['sub_total'] = $request->sub_total;
        $data['sale_amount'] = $request->sale_amount;
        $data['discount'] = $request->discount;
        $data['total_due'] = $request->total_due;
               $invoice->update($data);
               $invoice->details()->delete();
        $details_list = [];
        for($i=0 ; $i<count($request->product_name) ; $i++)
        {
            $details_list[$i]['product_name'] = $request->product_name[$i];
            $details_list[$i]['quantity'] = $request->quantity[$i];
            $details_list[$i]['price'] = $request->price[$i];
            $details_list[$i]['row_sub_total'] = $request->row_sub_total[$i];
        }
       $details =  $invoice->details()->createMany($details_list);
       return redirect()->route('sales_returns.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalesReturn  $salesReturn
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalesReturn $salesReturn)
    {
        //
    }
}
