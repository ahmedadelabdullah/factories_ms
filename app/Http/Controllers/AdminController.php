<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
   {
    $users = User::where('role' , 'admin')->get();
       return view('admins.index' , compact('users'));
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [];
        $data['name'] = $request->name;
        $data['user_name'] = $request->user_name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['com_code'] = 1;
        $data['address'] = $request->address;
        $data['role'] = 'admin';
        $data['password'] = Hash::make(123);

        $user = User::create($data);
        return redirect()->route('admin.admins.index')->with('adding', 'تم اضافة العنصر بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    $id = $request->id;
       $admin = User::findOrFail($id);
        $admin->update([
            'name' => $request->name,
            'user_name' => $request->user_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'com_code' => $request->com_code,
            'address' => $request->address,
            'role' => $request->role,
            
        ]);
    return redirect()->route('admin.admins.index')->with('success', 'تم تحديث البيانات بتجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request , $id)
    {
        $id = $request->id;
        $admin = User::findOrFail($id);
        $admin->delete();
        return redirect()->route('admin.admins.index')->with('delete', 'تم حذف العنصر بنجاح');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
