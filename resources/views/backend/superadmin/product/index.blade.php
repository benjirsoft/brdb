@extends('backend.layout.superadmin.admin')
@section('content')
<div class="row">
	<div class="col-lg-12">
                <div class="d-flex flex-wrap flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Product List</h4>
                    </div>
                    <a href="{{ route('addproductform')}}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Product</a>
                </div>
    </div>
            <div class="col-lg-12">
                <table class="data-tables table mb-0 tbl-server-info">
                    <thead class="thead-dark">
                        <tr class="ligth ligth-data">
                            <th>ProductID</th>
                            <th>Product</th>
                            <th>Category</th>
                            <th>SubCategory</th>
                            <th>Product Type</th>
                            <th>Description</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                    	@foreach ($product as $products)
                        <tr>
                        	<td>{{ $products->productid }}</td>
                        	<td>{{ $products->productname }}</td>
                        	<td>{{ $products->categoryid }}</td>
                            <td>{{ $products->subcategory }}</td>
                            <td>{{ $products->productype->producttypes }}</td>
                        	<td>{{ $products->description }}</td>
                            <td>
                                <div class="d-flex align-items-center list-action">

                                    <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                        href="{{ route('updateproduct', [$products->id ])}}"><i class="ri-pencil-line mr-0"></i></a>
                                    <a class="badge bg-warning mr-2"
                                       data-toggle="tooltip"
                                       data-placement="top"
                                       title=""
                                       data-original-title="Delete"
                                       href="#"
                                       onclick="return confirmDeleteproduct({{ $products->id }})">
                                      <i class="ri-delete-bin-line mr-0"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
</div>	
@endsection	