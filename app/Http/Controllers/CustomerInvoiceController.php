<?php

namespace App\Http\Controllers;

use App\Models\CustomerInvoice;
use App\Http\Requests\StoreCustomerInvoiceRequest;
use App\Http\Requests\UpdateCustomerInvoiceRequest;
use App\Models\Customer;
use App\Models\Product;
use App\Models\CustomersAccount;
use PDF;
use Illuminate\Http\Request;

class CustomerInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer_invoices = CustomersAccount::where('mark', '0')->get();
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
     * @param  \App\Models\CustomerInvoice  $customerInvoice
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customerInvoice = CustomersAccount::findOrFail($id);
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
        $invoice = CustomersAccount::find($id);
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
        $invoice = CustomersAccount::findOrFail($id);

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
        $data['total_due_invoice'] = $request->total_due;
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
       return redirect()->route('customerinvoices.index')->with('adding', 'تم تعديل الفاتورة بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerInvoice  $customerInvoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , $id)
    {
        $invoice = CustomersAccount::findOrFail($request->id);
        // return $request;
        // dd($invoice);
        $invoice->delete();
        return redirect()->route('customerinvoices.index')->with('delete', 'تم حذف الفاتورة بنجاح');;
    }


    public function print($id)
    {
        $customerInvoice = CustomerInvoice::findOrFail($id);
        return view('customerInvoices.print', compact('customerInvoice'));
        
    }

    public function pdf($id)
    {
        $customerInvoice = CustomerInvoice::findOrFail($id);
        $items = [];
        foreach($customerInvoice->details()->get() as $detail){
        $items[] = [
            'product_name' => $customerInvoice->product_name,
            'quantity' => $customerInvoice->quantity,
            'price' => $customerInvoice->price,
            'row_sub_total' => $customerInvoice->row_sub_total,
        ];
    } 

        $data['items'] = $items;
        $data['customer_id'] = $customerInvoice->customer_id;

        $data['invoice_number'] = $customerInvoice->invoice_number;
        $data['date'] = $customerInvoice->date_submit;
        $data['n_o_pieces'] = $customerInvoice->n_o_pieces;
        $data['sale_per_piece'] = $customerInvoice->sale_per_piece;
        $data['n_o_models'] = $customerInvoice->n_o_models;
        $data['recipient'] = $customerInvoice->recipient;
        $data['sub_total'] = $customerInvoice->sub_total;
        $data['sale_amount'] = $customerInvoice->sale_amount;
        $data['discount'] = $customerInvoice->discount;
        $data['total_due_invoice'] = $customerInvoice->total_due;

        $pdf = PDF::loadView('customerinvoices.pdf', $data);

        return $pdf->stream($customerInvoice->invoice_number.'.pdf');    
        // return $pdf->download($customerInvoice->customer.'.pdf');    
    }
}
