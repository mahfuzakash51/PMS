@extends('admin.layouts.master')

@section('content')

{{-- <form action="{{ route('orders.form.edit.update',$order->id) }}" method="post" id="create-order-form"> --}}
    @csrf
<div class="row">

    <div class="col-md-4">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Description</label>
            <input type="text" name="description" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>
    </div>
    <div class="col-md-2">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Quantity</label>
            <input type="number" name="quantity" class="form-control" id="exampleFormControlInput1" placeholder="" min="1">
        </div>
    </div>

 

    <div class="text-center mt-4">
        <a type="button" class="btn btn-dark" href="{{ url()->previous() }}" >Back</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</div>
</form>
@endsection
