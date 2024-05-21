@extends('admin.layouts.master')

@section('content')

<div class="card p-4">
  <h4>{{$order->title}}</h4>
  <p>{{$order->description}}</h4>
 
</div>



<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Quantity</th>
      

      
    </tr>
  </thead>
  <tbody>
     @forelse ($ordersDetails as $ordersDetail)
    <tr>
      <th scope="row">{{ $loop->index + 1 }}</th>
      <td>{{$ordersDetail->name}}</td>
      <td>{{$ordersDetail->description}}</td>
      <td>{{$ordersDetail->quantity}}</td>
      
    </tr>
    {{-- <td class="d-flex" style="gap: 6px;">
      
        <a class="btn btn-sm btn-success" href="{{ route('orders.form.edit',$ordersDetail->id) }}">Edit</a>
          @csrf
          <button class="btn btn-sm btn-danger" type="submit">Delete</button>
        </form>  
      
      
      
    </td> --}}

    @empty
    <tr>
      <td class="text-center" colspan="4">No data found</td>
    </tr> 
    @endforelse
   
   
  </tbody>
</table>
@endsection
