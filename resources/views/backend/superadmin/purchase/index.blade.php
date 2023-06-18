@extends('backend.layout.superadmin.admin')
@section('content')
<div class="row">
	<div class="col-lg-12">
                <div class="d-flex flex-wrap flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Purchase List</h4>
                        
                    </div>
                    <a href="{{ route('purchaseform')}}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Purchase</a>
                </div>
    </div>
            <div class="col-lg-12">
                <table class="data-tables table mb-0 tbl-server-info">
                    <thead class="thead-dark">
                        <tr class="ligth ligth-data">
                            <th>P-ID</th>
                            <th>O-ID</th>
                            <th>Product</th>
                            <th>Suppliar</th>
                            <th>UnitCost</th>
                            <th>Quentity</th>
                            <th>U-price</th>
                            <th>C-Price</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                    	@foreach ($purchase as $productspurchase)
                         
                        <tr>
                        	<td>{{ $productspurchase->purchaseid }}</td>
                            <td>{{ $productspurchase->orderid}}</td>
                        	<td>{{ $productspurchase->productinfo->productname }}</td>
                        	<td>{{ $productspurchase->suppliar->companyname }}</td>
                        	<td>{{ $productspurchase->unitcost }}</td>
                        	<td>{{ $productspurchase->quentity }}</td>
                            <td>{{ $productspurchase->unitsellsprice }}</td>
                            <td>{{ $productspurchase->cprice }}</td>
                            <td>
                                <div class="d-flex align-items-center list-action">                                    
                                    <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                        href="{{ route('purchaseupdate', [$productspurchase->id ?? null ])}}"><i class="ri-pencil-line mr-0"></i></a>
                                        
                                    <a class="badge bg-warning mr-2"
                                       data-toggle="tooltip"
                                       data-placement="top"
                                       title=""
                                       data-original-title="Delete"
                                       href="#"
                                       onclick="return confirmDeletepurchase({{ $productspurchase->id }})">
                                      <i class="ri-delete-bin-line mr-0"></i>
                                    </a>
                                        <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="PrintBarcode"
                                        href="{{ route('print-label',   ['barcode' => $productspurchase->barcode,'productname' => $productspurchase->productinfo->productname,   'productid' => $productspurchase->productid, 'quentity' => $productspurchase->quentity,'cprice' => $productspurchase->cprice]) }}"><i class="ri-printer-line"></i></a>
                                         <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Prininvoice"
                                        href="{{ route('print-invoice', [$productspurchase->purchaseid ?? null]) }}"><i class="ri-printer-line"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
</div>	
@endsection	