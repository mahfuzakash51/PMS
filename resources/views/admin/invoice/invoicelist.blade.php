@extends('admin.layouts.master')

@section('content')

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Order Title</th>
      <th scope="col">Payment Status</th>
      <th scope="col">Send Time</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>

    @forelse ( $invoices as $invoice )
      @if (isset($invoice->order) && $invoice->order->creator_id  == auth()->id())
      <tr>
        <th>{{$loop->index + 1}}</th>
        <td>{{ $invoice->order->title }}</td>
        <td>{{ $invoice->payment_status }}</td>
        <td>{{ $invoice->created_at }}</td>
        <td>
          <a class="btn btn-sm btn-info" href="{{route('manager.invoice.view', $invoice->id)}}">View</a>
        </td>
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
