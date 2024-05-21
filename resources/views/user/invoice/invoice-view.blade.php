@extends('user.layouts.app')

@section('content')
<div class="container" style="margin-top: 100px;">
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
        
    
</div>
    


@endsection


