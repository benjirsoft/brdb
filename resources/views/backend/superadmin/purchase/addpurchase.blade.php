@extends('backend.layout.superadmin.admin')
@section('content')
<div class="row">

    @php

    @endphp

	<div class="col-sm-12">
                <div class="card" style="background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(72,191,45,1) 0%, rgba(56,196,90,1) 49%, rgba(0,212,255,1) 100%);">
                    <div class="card-header d-flex justify-content-between">

                            <h4 style="margin-left: 50%; font-size: 20px; color:red; font-weight:bold" class="card-title">Add Purchase</h4>

                    </div>
                    @if (session('success'))
                          <div class="alert alert-success">
                              {{ session('success') }}
                          </div>
                    @endif

                      <!-- Display validation error messages -->
                    @if ($errors->any())
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ route('addpurchase')}}" method="POST" data-toggle="validator">
                        	@csrf
                            @if(isset(request()->slot_purchase_id))
                            <input type="hidden" name="purchaseid" value="{{request()->slot_purchase_id}}">
                            @else
                            <input type="hidden" name="purchaseid" value="{{$newpurchaseid}}">
                            @endif
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        @php
                                            $products = \App\Models\Productinfo::select(
                                                                        'productinfos.*',
                                                                        DB::raw('(SELECT unitcost FROM purchaseinfos WHERE productid = productinfos.productid ORDER BY id DESC LIMIT 1) as unitcost')
                                                                    )
                                                                    ->get();
//                                            dd($products);

                                        @endphp
                                        <select name="productid" class="selectpicker select_product form-control package_select" data-style="py-0">
                                        @foreach($products as $product)
                                            <option
                                                style="font-size: 15px; height: 40px; font-weight: bold"
                                                data-unit_cost ="{{$product->unitcost}}"
                                                value="{{ $product->productid }}">{{ $product->productname }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select  name="suppliarid" class="selectpicker form-control package_select" data-style="py-0">
                                        @foreach($suppliar as $suppli)
                                            <option style="font-size: 15px; height: 40px; font-weight: bold" value="{{ $suppli->suppliarid }}">{{ $suppli->name }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input placeholder="OrderDate" type="date" name="orderdate" class="form-control">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input placeholder="delivaryDate" type="date" name="delivarydate" class="form-control">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input placeholder="Unit Cost" type="text" name="unitcost" class="form-control unit_cost">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input placeholder="Quentity"  type="text" name="quentity" class="form-control qty">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                       <input placeholder="Vat"  type="text" name="vat"  class="form-control vat">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input placeholder="Total Purchase Price" type="text" name="totalpurchaseprice" class="form-control total_purchase_price">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input placeholder="Profit %" type="text" name="profitpercentage" class="form-control profit_purchase">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input placeholder="Unit Sells Price" type="text" name="unitSellsprice" class="form-control unit_sell_price">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input placeholder="Total Sells Price" type="text" name="totalsellsprice" class="form-control total_sell_price">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input placeholder="Customer Price" type="text" name="cprice" class="form-control customer_price">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input placeholder="Other" type="text" name="other" class="form-control">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input placeholder="description" type="text" class="form-control" name="description">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">addproduct</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <br>
                            <br>
                            <a href="{{route('purchaseform')}}" class="btn btn-danger">Save</a>
                            <a href="#" class="btn btn-primary">Invoice</a>
                            <a href="#" class="btn btn-primary">PrintBarcode</a>
                        </form>
                    </div>
                     <a href="#" class="btn btn-danger show_purcahse_value_total"></a>
                </div>
            </div>
</div>
<div class="row">
            <div class="container-fluid">
                @if(request()->slot_purchase_id))
                 <div class="col-md-12">
                     @php
                        $purchaseGroups = \App\Models\Purchaseinfo::where('purchaseid', request()->slot_purchase_id)->get();
                     @endphp
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Barcode</th>
                              <th scope="col">PurchaseID</th>
                              <th scope="col">SuppliarID</th>
                              <th scope="col">Product</th>
                              <th scope="col">UnitPrice</th>
                              <th scope="col">qty</th>
                              <th scope="col">vat</th>
                                <th scope="col">Total Purchase Price</th>
                              <th scope="col">CustomerPrice</th>
                                <th scope="col">Print</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($purchaseGroups as $key => $item)
                            <tr>
                              <th scope="row">{{++$key}}</th>
                                <th>{{ $item->barcode }}</th>
                              <th>{{$item->purchaseid}}</th>
                              <td>{{$item->suppliarid}}</td>
                              <td>{{\App\Models\Productinfo::where('productid', $item->productid)->first()->productname ?? null}}</td>
                              <td>{{$item->unitcost }}</td>
                              <td>{{$item->quentity }}</td>
                                <td>{{$item->vatid }}</td>
                              <td class="sum_purchase_price">{{$item->totalprice }}</td>
                              <td>{{$item->cprice }}</td>
                                <td><a class="btn btn-danger" href="#">PrintBarcode</a>
                                    <a class="btn btn-danger" href="#">remove</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                 </div>
                @endif
            </div>
        </div>
@endsection
@section('search')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>

$(document).ready(function() {
    $('.package_select').select2(
        {
            'width' : '100%'
        }
    );
});


//fill up product unit cost field based on Select product
let unit_cost = $('input.unit_cost');
let qty = $('input.qty');
let unitSellPrice = $('input.unit_sell_price');
let total_sell_price = $('input.total_sell_price');
let vat = $('input.vat');
let customer_price = $('input.customer_price');


$('.select_product').on('change', function(){
    let getUnitCost = $(this).find(':selected').data('unit_cost');
    unit_cost.val(getUnitCost)
    updateTotalPurchasePrice();
})

//Calculate total purcahse price based on unit cost*qty
function updateTotalPurchasePrice(){
    $('input.unit_cost, input.qty').on('keyup', function(){
        let unit_cost = $('input.unit_cost').val()
        let qty = $('input.qty').val()
        let calculate =unit_cost*qty;
        $('input.total_purchase_price').val(calculate)
    })
}
updateTotalPurchasePrice();

//Total Sell price Calculate
$('.unit_sell_price').on('keyup', function(){
    let calculate = unitSellPrice.val()*qty.val();
    total_sell_price.val(calculate);
})

//Update customer price
$('input.unit_sell_price, input.vat').on('keyup', function(){
    let unit_sell_price  = Math.round($('input.unit_sell_price').val());
    let calculate = (unit_sell_price*Math.round(vat.val())/100)
        calculate = Math.round(calculate+unit_sell_price)
    customer_price.val(calculate)

    const profitPercentage = ((unit_sell_price - Math.round(unit_cost.val())) / unit_sell_price) * 100;
    $('input.profit_purchase').val(profitPercentage)
})

let sum = 0;
$('.sum_purchase_price').each(function(){
    sum += Math.round($(this).text())
})
$('.show_purcahse_value_total').text(sum)


</script>

@endsection
