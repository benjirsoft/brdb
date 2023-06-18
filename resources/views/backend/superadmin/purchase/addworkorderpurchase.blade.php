@extends('backend.layout.superadmin.admin')
@section('content')
<div class="row">
	<div class="col-sm-12">
                <div class="card"  style="background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(72,191,45,1) 0%, rgba(56,196,90,1) 49%, rgba(0,212,255,1) 100%);">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Add Purchase</h4>
                        </div>
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
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="dob">Purchase ID</label>
                                        <label>New =  {{ $newpurchaseid }}</label>
                                        <input style="width: 200px;  font-size: 30px; height: 40px; font-weight: bold" type="text"  value="{{ $purchasid }}" class="form-control" id="dob" name="purchaseid"/>
                                    </div>
                                </div>
                                <div class="col-md-3">                      
                                    <div class="form-group">
                                        <label>OrderID</label>
                                        <input style="width: 200px;  font-size: 30px; height: 40px; font-weight: bold" type="text"   value="{{ $findworkorder->orderid }}" class="form-control" id="dob" data-errors="Please Enter Code." name="orderid" required/>
                                        <div class="help-block with-errors"></div>

                                    </div>
                                </div>  
                                <div class="col-md-3">                      
                                    <div class="form-group">
                                        <label>ProductID</label>

                                        <select style="width: 200px"  name="productid" class="selectpicker form-control" data-style="py-0">
                                            <option style="font-size: 20px; height: 40px; font-weight: bold" value="{{ $findworkorder->productname->productid }}">{{ $findworkorder->productname->productname  }}</option>
                                        </select>

                                    </div>
                                </div>    
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select style="width: 200px"  name="categoryid" class="selectpicker form-control" data-style="py-0">
                                            <option style="font-size: 20px; height: 40px; font-weight: bold" value="{{ $findworkorder->categoryname->id }}">{{ $findworkorder->categoryname->name }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>SubCategory</label>
                                        <select style="width: 200px"  name="subcategoryid" class="selectpicker form-control" data-style="py-0">
                                            <option style="font-size: 16px; height: 40px;" value="{{ $findworkorder->subcategory->id }}">{{ $findworkorder->subcategory->subcategoriesname }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Suppliarid</label>
                                        <select style="width: 200px"  name="suppliarid" class="selectpicker form-control" data-style="py-0">
                                            <option style="font-size: 16px; height: 40px;" value="{{ $findworkorder->suppliar->suppliarid }}">{{ $findworkorder->suppliar->name }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>OrderDate</label>
                                        <input style="width: 200px; font-size: 30px; height: 40px; font-weight: bold" type="date" value="{{ $findworkorder->date }}" name="date" class="form-control">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Unit Cost</label>
                                        <input style="width: 200px;  font-size: 30px; height: 40px; font-weight: bold" type="text" data-errors="Please Enter" value="{{ $findworkorder->unitcost }}" name="unitcost" class="form-control" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Quentity</label>
                                        <input style="width: 200px;  font-size: 30px; height: 40px; font-weight: bold" type="text" data-errors="Please Enter" value="{{ $findworkorder->quentity }}" name="quentity" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Vat</label>
                                        <input style="width: 200px;  font-size: 30px; height: 40px; font-weight: bold"  value="{{ $findworkorder->vat }}"  type="text" name="vat"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Total Purchase Price</label>
                                        <input style="width: 200px;  font-size: 27px; height: 40px; font-weight: bold"  type="text" name="totalpurchaseprice" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Profit %</label>
                                        <input style="width: 200px;  font-size: 27px; height: 40px; font-weight: bold"  type="text" name="profitpercentage" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Unit Sells Price</label>
                                        <input style="width: 200px;  font-size: 27px; height: 40px; font-weight: bold"  type="text" name="unitSellsprice" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Total Sells Price</label>
                                        <input style="width: 200px;  font-size: 27px; height: 40px; font-weight: bold"  type="text" name="totalsellsprice" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Customer Price</label>
                                        <input style="width: 200px;  font-size: 27px; height: 40px; font-weight: bold" type="text" data-errors="Please Enter" name="cprice" class="form-control" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Other</label>
                                        <input type="text" value="{{ $findworkorder->other }}" name="other" class="form-control">
                                        
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>description</label>
                                        <input type="text" value="{{ $findworkorder->description }}" class="form-control" name="description">
                                        
                                    </div>
                                </div>                         
                            </div>                            
                            <button type="submit" class="btn btn-primary mr-2">Save</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
</div>	
@endsection	
@section('search')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>

$(document).ready(function() {
    $('.package_select').select2();
});
</script>
@endsection