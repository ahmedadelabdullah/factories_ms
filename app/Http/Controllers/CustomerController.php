<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

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
        $customer_sum = Customer::sum('current_balance');
        return view('customers.index', compact('customers' , 'customer_sum'));
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
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['start_balance'] = $request->start_balance;
        $data['com_code'] = 1;
        $data['address'] = $request->address;
        $customer = Customer::create($data);
        return redirect()->route('customers.index')->with('adding', 'تم اضافة العنصر بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($customer)
    {
        // dd('customers');
        $customer = Customer::findOrFail($customer);
        $invoices_sum = $customer->accounts->sum('total_due_invoice');
        $returns_sum = $customer->accounts->sum('total_due_return');
        $payments_sum = $customer->accounts->sum('total_due_payment');
        

        return view('customers.show' , compact('customer' , 'invoices_sum' , 'returns_sum' , 'payments_sum'));
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
             'start_balance' => $request->start_balance,
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
