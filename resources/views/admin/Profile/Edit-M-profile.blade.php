@extends('admin.layouts.master')

@section('content')

<form action="{{ route('manager.profile.update',$user->id) }}" method="post" id="create-order-form">
    @csrf
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" name="name" value="{{$user->name}}" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Company Name</label>
            <textarea name="company_name" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$user->company_name}}</textarea>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="text" name="email" value="{{$user->email}}" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Mobile Number</label>
            <input type="text" name="mobile_number" value="{{$user->mobile_number}}" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Address</label>
            <input type="text" name="address" value="{{$user->address}}" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>
    </div>

    <div class="text-center mt-4">
        <a type="button" class="btn btn-dark" href="{{ url()->previous() }}" >Back</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</div>
</form>
@endsection
