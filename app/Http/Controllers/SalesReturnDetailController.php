<?php

namespace App\Http\Controllers;

use App\Models\Sales_return_detail;
use App\Http\Requests\StoreSales_return_detailRequest;
use App\Http\Requests\UpdateSales_return_detailRequest;

class SalesReturnDetailController extends Controller
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
     * @param  \App\Http\Requests\StoreSales_return_detailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSales_return_detailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sales_return_detail  $sales_return_detail
     * @return \Illuminate\Http\Response
     */
    public function show(Sales_return_detail $sales_return_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sales_return_detail  $sales_return_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Sales_return_detail $sales_return_detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSales_return_detailRequest  $request
     * @param  \App\Models\Sales_return_detail  $sales_return_detail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSales_return_detailRequest $request, Sales_return_detail $sales_return_detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sales_return_detail  $sales_return_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sales_return_detail $sales_return_detail)
    {
        //
    }
}
