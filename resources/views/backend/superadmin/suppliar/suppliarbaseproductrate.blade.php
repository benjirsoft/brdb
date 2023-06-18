@extends('backend.layout.superadmin.admin')
@section('content')
<div class="row">
	<div class="col-lg-12">
                <div class="d-flex flex-wrap flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Suppliar List</h4>
                    </div>
                    <a href="#" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Suppliar</a>
                </div>
    </div>
            <div class="col-lg-12">
               <table class="data-tables table mb-0 tbl-server-info">
                    <thead class="thead-dark">
                        <tr class="ligth ligth-data">
                            <th>SuppliarID</th>
                            <th>Name</th>
                            <th>Productid</th>
                            <th>Productname</th>
                            <th>Rate</th>
                            <th>SPrice</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                    	@foreach ($supplierProductRateList as $supplierProductRate)
                        <tr>
                        	<td>{{ $supplierProductRate['supplier_id'] }}</td>
					        <td>{{ $supplierProductRate['supplier_name'] }}</td>
					        <td>{{ $supplierProductRate['product_id'] }}</td>
					        <td>{{ $supplierProductRate['product_name'] }}</td>
					        <td>{{ $supplierProductRate['product_rate'] }}</td>
                            <td>{{ $supplierProductRate['customer_price'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
</div>
@endsection	