@extends('admin.layouts.master')

@section('content')

@csrf


<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Order Title</th>
      <th scope="col">Payment_status</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>

    @forelse ( $invoices as $invoiceList )
      @if ($invoiceList->order->creator_id  == auth()->id())
      <tr>
        <th scope="row">{{$loop->index + 1}}</th>
        <td>{{ $invoiceList->order->title }}</td>
        <td>{{ $invoiceList->payment_status }}</td>
        <td>View</td>
      </tr>    
      @endif
   
        
    @empty
     <tr>
      <td class="text-center" colspan="6">No data found</td>
    </tr>   
    @endforelse
  
   
  </tbody>
</table>

@endsection
