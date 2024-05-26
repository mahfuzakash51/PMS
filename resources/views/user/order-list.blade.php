@extends('user.layouts.app')

@section('content')
<div class="container" style="margin-top: 100px;">
    @forelse ($orders as $order)
        <div class="card p-4 my-3" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">
            <div class="card-body">
                <div class="d-flex">
                    <h4><a href="{{ route('user.order.details',$order->id) }}">{{$order->title}}</a></h4>
                    <div class="ms-auto">
                       
                        {{ $order->Category?  $order->Category->name : '--'}}
                        <div>
                            {{$order->created_at}}
                        </div>
                    </div>
                    
                </div>
                
                
                
                <p>{{$order->description}}</p>
                <div class="d-flex mb-4">
                @foreach ($order->orderItems as $item)   
                    <div class="px-3 py-2 card me-3">
                        {{$item->name}}  ({{$item->quantity}})
                    </div>  
                @endforeach
                </div>

                <div>
                    <a href="{{ route('user.order.proposal', $order->id) }}" class="btn btn-success">Request Here</a>
                </div>
            </div>

            
        </div>
    @empty
        
    @endforelse    
</div>
    


@endsection


