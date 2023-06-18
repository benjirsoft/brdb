@extends('backend.layout.superadmin.admin')
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
                            <th>Prodcut Name</th>
                            <th>Barcode</th>
                            <th>UnitCost</th>
                            <th>Sellsprice</th>
                             <th>Vat</th>
                            <th>Profit</th>
                            <th>Date Time</th>
                        </tr>
                    </thead>
                    <tbody class="ligth-body">
                        @foreach ($report as $list)
                         @php 
                            $product = DB::table('purchaseinfos')
                                        ->leftjoin('productinfos', 'productinfos.id', 'purchaseinfos.productid')
                                        ->select('productinfos.productname')
                                        ->where('purchaseinfos.barcode', $list->pi_barcode)->first();
                           @dump($product);
                         @endphp
                        <tr>
                            <td>{{$product->productname}}</td>
                            <td>{{ $list->pi_barcode }}</td>
                            <td>{{ $list->unitcost}}</td>
                            <td>{{ $list->price }}</td>
                            <td>{{ $list->vat }}</td>
                            <td>{{ $list->profitMargin }}</td>
                            <td>{{ $list->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
</div>  	
@endsection	