@extends('user.layouts.app')
@if (auth()->user()->role !== 'VENDOR')
  <div class="card p-4 my-5 text-center text-danger"  style="margin-top: 200px;">
        <b>Please login as vendor</b>
  </div>         
@else
    @section('content')
    <div class="container" style="margin-top: 100px;">
        <form action="{{ route('proposal.store',$order->id) }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Budget</label>
                        <input type="number" name="budget" class="form-control" id="exampleFormControlInput1" placeholder="" min="0">
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary" href="{{ route('user.orderlist') }}">Send Proposal</button>
                </div>
            </div>
        </form>
    </div>
    @endsection
@endif