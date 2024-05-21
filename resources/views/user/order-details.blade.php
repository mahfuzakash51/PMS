@extends('user.layouts.app')

@section('content')
<div class="container" style="margin-top: 100px;">
    <div class="">
        <div>
            <b>Order Name: {{$order->title}}</b>
        </div>
        <div>
            <p><b>Description: </b>{{$order->description}}</p>
        </div>

        <div>
          <p><b>Status: </b>{{$order->status}}</p>
      </div>

        
<table class="table mt-4">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Quantity</th>
        
      </tr>
    </thead>
    <tbody>
       @forelse ($order->orderItems as $ordersDetail)
      <tr>
        <th scope="row">{{ $loop->index + 1 }}</th>
        <td>{{$ordersDetail->name}}</td>
        <td>{{$ordersDetail->description}}</td>
        <td>{{$ordersDetail->quantity}}</td>
      </tr>
  
      @empty
      <tr>
        <td class="text-center" colspan="4">No data found</td>
      </tr> 
      @endforelse
     
     
    </tbody>
  </table>
       
    </div>
</div>
    


@endsection


