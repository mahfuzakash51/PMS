@extends('user.layouts.app')

@section('content')
<div class="container" style="margin-top: 100px;">
   <h4>Proposal list</h4>
    <hr>

    
  <table class="table">
    <thead>
      <tr>
        <th style="width: 5%;">ID</th>
        <th style="width: 15%;">Order Title</th>
        <th style="width: 25%;">Description</th>
        <th style="width: 15%;">Vendor Info</th>
        <th style="width: 15%;">Proposal Cost</th>
        <th style="width: 10%;">Status</th>
        <th style="width: 15%;">Action</th>
      </tr>
    </thead>
    <tbody>

      @forelse ($proposals as $proposalList)

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
        <td class="d-flex" style="gap: 6px">
          @if ($proposalList->status === 'SEND')
            <form action="{{ route('vendor.proposal.remove',$proposalList->id) }}" method="post">
              @csrf
              <button class="btn btn-sm btn-danger" type="submit">Remove</button>
            </form>    
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

</div>

@endsection


