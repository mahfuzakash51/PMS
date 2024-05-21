<?php

namespace App\Http\Controllers;

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
}
