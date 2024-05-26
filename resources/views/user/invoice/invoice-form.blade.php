@extends('user.layouts.app')
@if (auth()->user()->role !== 'VENDOR')
  <div class="card p-4 text-center text-danger" style="margin-top: 200px;">
        <b>Please login as vendor</b>
  </div>         
@else
@section('content')
<div class="container" style="margin-top: 100px;">
    <h4>Create Invoice</h4>
    <form action="{{ route('invoice.submit',$order->id) }}" method="post">
        @csrf
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
                @foreach ($order->orderItems as $i=>$item)
                <tr>
                    <td><input type="text" name="name[]" value="{{$item->name}}" readonly required ></td>
                    <td><input type="number" name="quantity[]" value="{{$item->quantity}}" readonly required ></td>
                    <td><input class="unit_price" step="5" type="number" name="unit_price[]" data-qty="{{$item->quantity}}" data-total=".total_price{{$i}}" min="0" required ></td>
                    <td><input class="total_price{{$i}} total-price"  step="5" type="number" name="total_price[]" min="0" required readonly ></td>
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td>Sub Total:</td>
                    <td><input class="sub-total"  step="5" type="number" name="" min="0" value="0" required readonly ></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="name[]" value="Extra Cost(shipping/tax)" readonly required ></td>
                    <td><input type="hidden" name="quantity[]" value=""  ></td>
                    <td><input type="hidden" name="unit_price[]" value="" >Extra Cost(shipping/tax)</td>
                    <td><input class="extra"  step="5" type="number" name="total_price[]" min="0" value="0" required ></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Total Cost:</td>
                    <td><input class="main-total"  step="5" type="number" name="total_cost" min="0" value="0" required readonly ></td>
                </tr>
              
            </tbody>
          </table>
        <div class="row mt-3">
            <div class="text-center">
                <button type="submit" class="btn btn-primary" href="{{ route('user.orderlist') }}">Send Invoice</button>
            </div>
        </div>
    </form>
</div>
@endsection
@endif

@section('js')

<script>
$(document).ready(function(){        
    $( ".unit_price" ).on( "keyup", function() {
        let unit_value = parseFloat($(this).val());
        let qty = parseFloat($(this).data('qty'));
        let total = unit_value * qty;
        $($(this).data('total')).val(total.toFixed(2))

        subTotalCalculation();
    } );

    function subTotalCalculation() {
        let total = 0;
        $(".total-price").each(function(){
            total = total + parseFloat($(this).val());
        });

        $('.sub-total').val(total.toFixed(2));
    }

    $( ".extra" ).on( "keyup", function() {
        let extra = parseFloat($(this).val());
        let subTotal = parseFloat($('.sub-total').val());
        let total = extra + subTotal;
        $('.main-total').val(total.toFixed(2));
    } );


    
});
</script>
    
@endsection


