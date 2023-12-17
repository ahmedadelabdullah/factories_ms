<?php

namespace App\Http\Controllers;

use App\Models\CustomerInvoiceDetail;
use App\Http\Requests\StoreCustomerInvoiceDetailRequest;
use App\Http\Requests\UpdateCustomerInvoiceDetailRequest;

class CustomerInvoiceDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreCustomerInvoiceDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerInvoiceDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerInvoiceDetail  $customerInvoiceDetail
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerInvoiceDetail $customerInvoiceDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerInvoiceDetail  $customerInvoiceDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerInvoiceDetail $customerInvoiceDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerInvoiceDetailRequest  $request
     * @param  \App\Models\CustomerInvoiceDetail  $customerInvoiceDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerInvoiceDetailRequest $request, CustomerInvoiceDetail $customerInvoiceDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerInvoiceDetail  $customerInvoiceDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerInvoiceDetail $customerInvoiceDetail)
    {
        //
    }
}
