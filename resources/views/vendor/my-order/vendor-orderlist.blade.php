@extends('user.layouts.app')

@if (auth()->user()->role !== 'VENDOR')
  <div class="card p-4 my-5 text-center text-danger">
        <b>Please login as vendor</b>
  </div>         
@else
  @section('content')
    <div class="container" style="margin-top: 100px;">
        <form action="" method="get">
            <div class="d-flex">
                <select class="form-control me-2" name="status" style="width: 150px;">
                    <option @selected($status === "PROCESSING") value="PROCESSING">Processing</option>
                    <option @selected($status === "COMPLETE") value="COMPLETE">Complete</option>
                </select>
                <button class="btn btn-primary" type="submit">Show data</button>
            </div>    
        </form>
        <hr>

        <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th >Title</th>
                <th style="width: 40%" >Description</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($orders as $order)
                <tr>
                  <td>{{$loop->index+1 }}</td>
                  <td>{{ $order->title }}</td>
                  <td>{{ $order->description }}</td>
                  <td class="text-center">{{ $order->status }}</td>
                  <td class="">
                    <div class="d-flex justify-content-center" style="gap: 6px;">
                      <a class="btn btn-sm btn-info" href="{{route('user.order.details', $order->id)}}">Details</a>
                      @if ($status != 'SEND' && !isset($order->invoice))
                          <a class="btn btn-sm btn-info" href="{{route('vendor.invoice.form', $order->id)}}">Create Invoice</a>
                      @endif
                      @if ($status != 'SEND' && isset($order->invoice))
                      <a class="btn btn-sm btn-info" href="{{route('invoice.view', $order->id)}}">View Invoice</a>
                  @endif
                    </div>
                  </td> 
                </tr>   
              @empty
                <tr>
                  <td class="text-center" colspan="5">No data found!</td>
                </tr>
                  
              @endforelse
            </tbody>
        </table>


        

    
    </div>
  @endsection
@endif


