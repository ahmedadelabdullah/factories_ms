<?php

namespace App\Http\Controllers;

use App\Models\CustomersAccount;
use Illuminate\Http\Request;

class CustomersAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer_accounts = CustomersAccount::orderBy('date', 'desc')->get();
        // dd($customer_accounts);
        return view('customers_accounts.index' , compact('customer_accounts'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
                $data['sale_amount'] = $request->sale_amount;
                $data['discount'] = $request->discount;
                $data['total_due_invoice'] = $request->total_due;
                $invoice =  CustomersAccount::create($data);
        
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
               return redirect()->route('customerinvoices.index')->with('adding', 'تم اضافة الفاتورة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomersAccount  $customersAccount
     * @return \Illuminate\Http\Response
     */
    public function show(CustomersAccount $customersAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomersAccount  $customersAccount
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CustomersAccount  $customersAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomersAccount $customersAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomersAccount  $customersAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomersAccount $customersAccount)
    {
        //
    }
}
