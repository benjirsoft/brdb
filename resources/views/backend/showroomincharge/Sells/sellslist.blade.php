@extends('backend.layout.showroominchage.admin')
@section('content')
<div class="row">
	<div class="col-lg-12">
                <div class="d-flex flex-wrap flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Daily Sells List</h4>
                        
                    </div>
                    <a href="{{ route('sellsform')}}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Sells</a>
                </div>
    </div>
            <div class="col-lg-12">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr class="ligth ligth-data">
                            <th>SellsID</th>
                            <th>Payment</th>
                            <th>Amount</th>
                             <th>Vat</th>
                            <th>Discount</th>
                            <th>Date Time</th>
                            
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                    	@foreach ($listsells as $list)
                         
                        <tr>
                        	<td>{{ $list->cartid }}</td>
                            <td>{{ $list->payment->name}}</td>
                        	<td>{{ $list->totalamount }}</td>
                        	<td>{{ $list->totalvat }}</td>
                            <td>{{ $list->discount }}</td>
                        	<td>{{ $list->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
</div>	
@endsection	