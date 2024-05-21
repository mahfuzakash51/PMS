<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    
    public function orderslist(Request $request)
    {
        $orders = Order::latest()->where('creator_id', auth()->id())->paginate(10);

        $categories = Category::all();
        return view('admin.order.orderlist', ['orders'=>$orders, 'page'=>$request->page??1, 'categories'=>$categories]);
    }

    public function createOrder(Request $request)
    {
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'creator_id' => auth()->id(),
            'category_id' => $request->category_id,
            'status' =>'OPEN',
        ];
        $order = Order::create($data);

        foreach ($request->item_name as $i => $value) {
            $data = [
                'order_id'=> $order->id,
                'name' => $request->item_name[$i],
                'description' => $request->item_description[$i],
                'quantity' => $request->item_quantity[$i],
            ];
            OrderItem::create($data);
        }

        return [
            'status' => true
        ];   
    }

    public function details($id)
    {
        $order = Order::where('creator_id',auth()->id())->where('id',$id)->first();
        $ordersDetails =  OrderItem::where('order_id', $id)->get();
        return view('admin.order.details',compact('ordersDetails', 'order'));
    } 

    public function userOrderslist(Request $request)
    {
        $orders = Order::latest()->where('status', 'OPEN')->paginate(10);
        return view('user.order-list', ['orders'=>$orders, 'page'=>$request->page??1]);
    }
    
    public function userOrderDetails($id)
    {
        $order = Order::where('id',$id)->where('id',$id)->first();
        
        return view('user.order-details',compact('order'));
    }
    
    public function deleteOrder($id)
    {
        Order::where('id',$id)->delete();

        Proposal::where('order_id', $id)->delete();
        
        return redirect()->back()->with('success', 'Order deleted successfully');
    }


    // vendor order controller
    public function vendorOrderList(Request $request)
    {
        if($request->status === 'COMPLETE') {
            $status = 'COMPLETE';
        } else {
            $status = 'PROCESSING';
        }
        $orders = Order::where('status', $status)->where('user_id', auth()->id())->get();

        return view('vendor.my-order.vendor-orderlist',compact('orders', 'status'));
    }
    

    // manager
    public function OrderEditForm($id)
    {
        $order = Order::where('status', 'OPEN')->where('id', $id)->first();

        return view('admin.order.edit-form',compact('order'));
    }
    
    public function updateOrder(Request $request, $id)
    {
        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];
        $order = Order::where('id', $id)->where('status', 'OPEN')->update($data);

        return redirect()->route('orderlist')->with('success', 'Order updated successfully');
    }

    public function OrderDetailsEditForm($id)
    {
        $order = Order::where('status', 'OPEN')->find($id);

        return view('admin.order.details-edit-form',compact('order'));
    }

    public function OrderDetailsUpdatetForm(Request $request, $id)
    {
        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];
        $order = Order::where('id', $id)->where('status', 'OPEN')->update($data);

        return redirect()->route('orderlist')->with('success', 'Order updated successfully');
    }

    public function OrderEditForms($id)
    {
        $order = Order::where('status', 'OPEN')->find($id);

        return view('admin.order.edit-item-form',compact('order'));
    }

    public function OrderEditFormsUpdate($id)
    {
        $order = Order::where('status', 'OPEN')->find($id);

        return view('admin.order.edit-item-form',compact('order'));
    }
    

    

}


