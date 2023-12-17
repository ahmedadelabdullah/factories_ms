<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
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
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        $data = [];
        $data['name'] = $request->name;
        $data['owner'] = $request->owner;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['com_code'] = 1;
        $data['address'] = $request->address;
        $data['details'] = $request->details;
        $customer = Customer::create($data);
        return redirect()->route('customers.index')->with('adding', 'تم اضافة العنصر بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $id = $request->id;
        $admin = Customer::findOrFail($id);
         $admin->update([
             'name' => $request->name,
             'phone' => $request->phone,
             'owner' => $request->owner,
             'address' => $request->address,
             
         ]);
     return redirect()->route('customers.index')->with('success', 'تم تحديث البيانات بتجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , $id)
    {
        $id = $request->id;
        $admin = Customer::findOrFail($id);
        $admin->delete();
        return redirect()->route('customers.index')->with('delete', 'تم حذف العنصر بنجاح');
    }
    
}
