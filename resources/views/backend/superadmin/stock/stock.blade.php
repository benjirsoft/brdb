@extends('backend.layout.superadmin.admin')
@section('content')
<div class="row">
	<div class="col-lg-12">
                <div class="d-flex flex-wrap flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Product Stock List</h4>
                    </div>
                </div>
    </div>
            <div class="col-lg-12">
                <table class="data-tables table mb-0 tbl-server-info">
                    <thead class="thead-dark">
                        <tr class="ligth ligth-data">
                            <th>Product</th>
                            <th>Stock</th>                         
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                    	@foreach ($stock as $productstock)
                        <tr>
                        	<td>{{ $productstock->product->productname }}</td>
                        	<td>{{ $productstock->stock }}</td>                          
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
</div>
@endsection	