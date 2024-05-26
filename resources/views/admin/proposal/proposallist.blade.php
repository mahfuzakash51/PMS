@extends('admin.layouts.master')

@section('content')




<table class="table">
  <thead>
    <tr>
      <th style="width: 5%;">ID</th>
      <th style="width: 15%;">Order Title</th>
      <th style="width: 25%;">Description</th>
      <th style="width: 15%;">Vendor Info</th>
      <th style="width: 10%;">Proposal Cost</th>
      <th style="width: 10%;">Status</th>
      <th class="width: 15% ">Create Time</th>
      <th style="width: 10%;">Action</th>
      
    </tr>
  </thead>
  <tbody>

    @forelse ($proposal as $proposalList)

    <tr>
      <th scope="row">{{$loop->index+1}}</th>
      <td>{{ $proposalList->order?$proposalList->order->title:"Order deleted !" }}</td>
      <td>{{ $proposalList->description }}</td>
      <td>
        <p class="mb-1"><b>{{ $proposalList->user->name }}</b></p>
        <p>{{ $proposalList->user->company_name }}</p>
      </td>
      <td>{{ $proposalList->budget }} BDT</td>
      <td>{{ $proposalList->status }}</td>
      <td>{{$proposalList->created_at}}</td>
      <td class="">
        <div class="d-flex justify-content-center" style="gap: 6px">
          @if ($proposalList->status === 'SEND')
          <form action="{{ route('proposal.accept',$proposalList->id) }}" method="post">
            @csrf
            <button class="btn btn-sm btn-success" type="submit">Accept</button>
          </form>

          <form action="{{ route('proposal.reject',$proposalList->id) }}" method="post">
            @csrf
            <button class="btn btn-sm btn-danger" type="submit">Reject</button>
          </form> 
          
         <div>    
        @endif
      </td>
    </tr>
    @empty
     <tr>

      <td class="text-center" colspan="6">No data found</td>
    </tr>   
    @endforelse
   
   
  </tbody>
</table>
@endsection
