@extends('admin.layouts.master')

@section('content')

<form action="{{ route('orders.update',$order->id) }}" method="post" id="create-order-form">
    @csrf
<div class="row">
    <div class="col-md-6">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" name="title" value="{{$order->title}}" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$order->description}}</textarea>
        </div>
    </div>

    <div class="text-center mt-4">
        <a type="button" class="btn btn-dark" href="{{ url()->previous() }}" >Back</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</div>
</form>
@endsection
