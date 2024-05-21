@extends('user.layouts.app')

@section('content')
<div class="container" style="margin-top: 100px;">
<h1>Vendor Information</h1>

<div class="text-center">
  <img src="{{ asset('assets/img/profile-vendor.png') }}" style="height: 80px" alt="img" >
</div>

<div class="mt-4">
  <table class="table mx-auto" style="max-width: 600px">
    <tr>
      <td>Name:</td>
      <td>{{$data->name}}</td>
    </tr>
    <tr>
      <td>Company Name:</td>
      <td>{{$data->company_name}}</td>
    </tr>
    <tr>
      <td>Email:</td>
      <td>{{$data->email}}</td>
    </tr>
    <tr>
      <td>Mobile Number:</td>
      <td>{{$data->mobile_number}}</td>
    </tr>
    <tr>
      <td>Address:</td>
      <td>{{$data->address}}</td>
    </tr>
    
  </table>
</div>

