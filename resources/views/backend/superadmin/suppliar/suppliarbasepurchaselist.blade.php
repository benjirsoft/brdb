@extends('backend.layout.superadmin.admin')
@section('content')
<div class="row">
	<div class="col-lg-12">
                <div class="d-flex flex-wrap flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Suppliar Base Purchase Amount</h4>
                    </div>
                    <a href="{{ route('adsuppliars')}}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Suppliar</a>
                </div>
    </div>
            <div class="col-lg-12">
               <table class="data-tables table mb-0 tbl-server-info">
                    <thead class="thead-dark">
                        <tr class="ligth ligth-data">
                            <th>SuppliarID</th>
                            <th>Name</th>
                            <th>Total Purchase</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                    	@foreach ($supplierPurchasePriceList as $suppliar)
                        <tr>
                        	<td>{{ $suppliar['supplier_id'] }}</td>
					        <td>{{ $suppliar['supplier_name'] }}</td>
					        <td>{{ $suppliar['total_purchase_price'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
</div>
@endsection	