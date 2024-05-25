<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profileView (Request $request)
    {
        $data= auth()->user(); 
        return view('vendor.Profile.v-profile',compact('data'));
    } 

    public function ManagerProfileView (Request $request)
    {
        $data= auth()->user(); 
        return view('admin..Profile.M-profile',compact('data'));
    } 

    public function ManagerEditForm(Request $request)
    {
        $user = user::where('id', auth()->id())->first();

        return view('admin.Profile.Edit-M-Profile',compact('user'));
    }
    
    public function ManagerUpdateForm(Request $request, $id)
    {
        $data = [
            'name' => $request->name,
            'company_name' => $request->company_name,
            'email' => $request->email,
            'mobile_number' => $request->mobile_number,
            'address' => $request->address,
        ];
        $user = User::where('id', auth()->id())->update($data);

        return redirect()->route('orderlist')->with('success', 'Profile updated successfully');
    }

    public function vendorEditForm(Request $request)
    {
        $user = user::where('id', auth()->id())->first();

        return view('vendor.Profile.Edit-V-Profile',compact('user'));
    }
    

    public function vendorUpdateForm(Request $request, $id)
    {
        $data = [
            'name' => $request->name,
            'company_name' => $request->company_name,
            'email' => $request->email,
            'mobile_number' => $request->mobile_number,
            'address' => $request->address,
        ];
        $user = User::where('id', auth()->id())->update($data);

        return redirect()->route('vendor.profile')->with('success', 'Profile updated successfully');
    }
}
