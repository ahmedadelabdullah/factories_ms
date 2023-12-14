<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        //  dd($request->user());
        return view('editprofile', [
            'user' => $request->user(),
        ]);
    }

    public function u(Request $request): View
    {
          dd($request->all());
  
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request)
    {

        $id  = Auth::user()->id;
        $data  = User::find($id);
        $data->user_name = $request->user_name;
        $data->name = $request->name;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->email = $request->email;


        if($request->file('photo')){
            $file = $request->file('photo');
            
            $image = explode(".",$file->getClientOriginalName());
            $newName = date('Ymdhi.').$image[1];
            // dd($newName);
             move_uploaded_file($_FILES['photo']['tmp_name'], public_path('uploads/profile_images/'.$newName));
            $data['photo'] = $newName;

            }

        $data->save();


        return Redirect::route('admin.profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
