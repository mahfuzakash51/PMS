<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Order;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function invoices()
    {
        $invoices= Invoice::all(); 
        return view('admin.invoice.invoicelist',compact('invoices'));

    }

    public function invoiceForm($id)  //order Id
    {
        $order= Order::where('id', $id)->first(); 
        return view('user.invoice.invoice-form',compact('order'));
    }

    public function invoiceSubmit(Request $request, $id)  //order Id
    {
        $details = [];
        foreach ($request->name as $i => $value) {
            $details[] = [
                'name' => $request->name[$i],
                'quantity' => $request->quantity[$i],
                'unit_price' => $request->unit_price[$i],
                'total_price' => $request->total_price[$i],
            ];
        }

        Invoice::create([
            'order_id'=>$id,
            'total_cost'=>$request->total_cost,
            'payment_method'=>null,
            'details'=> json_encode($details), // convert array to json
            'payment_status'=>'NO',

        ]);

        return redirect()-> route('vendor.orderList')->with('success', 'Invoice send successfully');
    }
    public function invoiceView($id) //order id
    {
        $order= Order::where('id', $id)->first(); 
        $invoice = $order->invoice;
        $items = json_decode($invoice->details);
        return view('user.invoice.invoice-view',compact('order','items','invoice'));
    }
}
