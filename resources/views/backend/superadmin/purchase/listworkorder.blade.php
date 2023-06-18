@extends('backend.layout.superadmin.admin')
@section('content')
<div class="row">
	<div class="col-lg-12">
                <div class="d-flex flex-wrap flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Product Order List</h4>
                        
                    </div>
                    <a href="{{ route('workorder') }}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Product Order</a>
                </div>
    </div>
            <div class="col-lg-12">
                <table class="data-tables table mb-0 tbl-server-info">
                    <thead class="thead-dark">
                        <tr class="ligth ligth-data">
                            <th>O-ID</th>
                            <th>Product</th>
                            <th>SubCategory</th>
                            <th>Suppliar</th>
                            <th>UnitCost</th>
                            <th>Quentity</th>
                            <th>T-Price</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                    	@foreach ($workorderlist as $productspurchase)
                         
                        <tr>
                        	<td>{{ $productspurchase->orderid }}</td>
                        	<td>{{ $productspurchase->productname->productname }}</td>
                            <td>{{ $productspurchase->subcategory->subcategoriesname }}</td>
                        	<td>{{ $productspurchase->suppliar->companyname }}</td>
                        	<td>{{ $productspurchase->unitcost }}</td>
                        	<td>{{ $productspurchase->quentity }}</td>
                        	<td>{{ $productspurchase->totalprice }}</td>
                            <td>
                                <div class="d-flex align-items-center list-action">
                                    <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Create Purchase"
                                        href="{{ route('purchaseorder',[$productspurchase->id]) }}"><i class="ri-eye-line mr-0"></i></a>
                                    <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                        href="{{ route('updateworkorder', [$productspurchase->id ])}}"><i class="ri-pencil-line mr-0"></i></a>


                                     <a class="badge bg-warning mr-2"
                                       data-toggle="tooltip"
                                       data-placement="top"
                                       title=""
                                       data-original-title="Delete"
                                       href="#"
                                       onclick="return confirmDeleteworkorder({{ $productspurchase->id }})">
                                      <i class="ri-delete-bin-line mr-0"></i>
                                    </a>   
                                    <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="PrintInvoice"
                                        href="{{ route('print-workorder',[$productspurchase->orderid]) }}"><i class="ri-printer-line"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
</div>	
@endsection	