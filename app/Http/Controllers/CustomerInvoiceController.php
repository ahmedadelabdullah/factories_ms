<?php

namespace App\Http\Controllers;

use App\Models\CustomerInvoice;
use App\Http\Requests\StoreCustomerInvoiceRequest;
use App\Http\Requests\UpdateCustomerInvoiceRequest;
use App\Models\Customer;
use App\Models\Product;
class CustomerInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer_invoices = CustomerInvoice::orderBy('id', 'desc')->get();
        return view('customerInvoices.index' , compact('customer_invoices'));
        
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

        return view('customerInvoices.create' , compact('customers' , 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerInvoiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerInvoiceRequest $request)
    {
        // return $request;
        $data = [];
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
               $invoice =  CustomerInvoice::create($data);

        $details_list = [];
// dd($request->product_id);
        for($i=0 ; $i<count($request->product_name) ; $i++)
        {
            $details_list[$i]['product_name'] = $request->product_name[$i];
            $details_list[$i]['quantity'] = $request->quantity[$i];
            $details_list[$i]['price'] = $request->price[$i];
            $details_list[$i]['row_sub_total'] = $request->row_sub_total[$i];
        }
       $details =  $invoice->details()->createMany($details_list);
       return redirect()->route('customerinvoices.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerInvoice  $customerInvoice
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customerInvoice = CustomerInvoice::findOrFail($id);
        return view('customerInvoices.show', compact('customerInvoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerInvoice  $customerInvoice
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $customers = Customer::all();
        $products = Product::all();
                $invoice = CustomerInvoice::find($id);
        return view('customerInvoices.edit' , compact('customers' , 'products' , 'invoice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerInvoiceRequest  $request
     * @param  \App\Models\CustomerInvoice  $customerInvoice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerInvoiceRequest $request, $id)
    {
        // return $request;
        $invoice = CustomerInvoice::findOrFail($id);

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
       return redirect()->route('customerinvoices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerInvoice  $customerInvoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerInvoice $customerInvoice)
    {
        //
    }
}
