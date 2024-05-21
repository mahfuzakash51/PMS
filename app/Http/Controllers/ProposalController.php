<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Proposal;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    public function proposals (Request $request)
    {
        $orders = Order::where('creator_id', auth()->user()->id)->select(['id'])->get();
        $orderIds = $orders->pluck('id')->toArray();
        $proposal= Proposal::whereIn('order_id', $orderIds)->get(); 

        return view('admin.proposal.proposallist',compact('proposal'));
    }

    public function userSendProposal($id)
    {
        if(auth()->check()) {
            if( auth()->user()->role === 'VENDOR') {
                $order = Order::where('id',$id)->where('id',$id)->first();
                
                return view('user.proposal.proposal-request',compact('order'));    
            } else {
                return "Only Vendor can send request";
            }  
        } else {
            return redirect()->route('login');
        }  
    }
    public function userProposalStore(Request $request, $id)
    {
        Proposal::create(
            [
                'order_id' =>$id,
                'description'=> $request->description,
                'user_id'=> auth()->id(),
                'budget' => $request->budget,
                'status'=> 'SEND',
            ]
        );

        return redirect()->back()->with('success', 'Proposal created successfully');
    }

    public function proposalAccept($id) 
    {
        $proposal = Proposal::where('id', $id)->first();
        Proposal::where('id', $id)->update(['status'=>'ACCEPT']);

        Order::where('id', $proposal->order_id)->update(['user_id'=> $proposal->user_id, 'status'=>'PROCESSING']);

        return redirect()->back()->with('success', 'Proposal accepted successfully');

    }

    public function proposalReject($id) 
    {
        Proposal::where('id', $id)->update(['status'=>'Reject']);

        return redirect()->back()->with('success', 'Proposal rejected successfully');
    }
     public function vendorProposalList (Request $request)
    {
        $proposals= Proposal::where('user_id', auth()->id())->get(); 
        return view('user.proposal.vendor-proposal',compact('proposals'));
    }
    public function removeVendorProposal($id) 
    {
        Proposal::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Proposal removed successfully');
    }


}



