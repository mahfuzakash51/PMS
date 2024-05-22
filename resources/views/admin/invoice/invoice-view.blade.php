@extends('admin.layouts.master')

@section('content')
<div class="text-center">
  <h4><b>Invoice</b> </h4>
</div>

<table class="table">
  <thead>
      <tr>
      <th scope="col">Item Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Unit Price (BDT)</th>
      <th scope="col">Total Price (BDT)</th>
      </tr>
  </thead>
  <tbody>
      @foreach ($items as $item)
      <tr>
          <td>{{$item->name}}</td>
          <td>{{$item->quantity}}</td>
          <td>{{$item->unit_price}}</td>
          <td>{{$item->total_price}}</td>
      </tr>
      @endforeach

      <tr style="border-top: 2px solid black;">
          <td></td>
          <td></td>
          <td>Total Cost:</td>
          <td>{{$invoice->total_cost}}</td>
      </tr>
      
  </tbody>
</table>


@if ($invoice->payment_status === 'YES')
    <div class="mt-4 mb-2 text-success"><b>Payment Complete</b></div>
    <div><p>Payment Method: {{$invoice->payment_method}}</p></div>
@else
  <form action="{{ route('manager.invoice.payment',$invoice->id) }}" method="post">
    @csrf
    <div class="row">
      <div class="col-md-6">
          <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Select Payment Method</label>
              <select name="payment_method" class="form-control" required>
                <option value="" selected disabled>Select Payment Method</option>
                <option value="Bkash (Mobile Banking)" >Bkash (Mobile Banking)</option>
                <option value="Nagad (Mobile Banking)" >Nagad (Mobile Banking)</option>
                <option value="DBBL Mobile Banking">DBBL Mobile Banking</option>
                <option value="Bank Transfer" >Bank Transfer</option>
                <option value="Cash" >Cash</option>
                <option value="Mobile Wallets" >Mobile Wallets</option>

              </select>
          </div>
      </div>
      <div class="col-md-6">
          <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Amount</label>
              <input type="text" value="{{$invoice->total_cost}}" class="form-control" readonly>
          </div>
      </div>

      <div class="text-center mt-4">
          <a type="button" class="btn btn-dark" href="{{ route('invoicelist') }}" >Back</a>
          <button type="submit" class="btn btn-primary">Payment & Accept Invoice</button>
      </div>
    </div>
  </form>
@endif

@endsection
