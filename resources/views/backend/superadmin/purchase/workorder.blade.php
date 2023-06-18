@extends('backend.layout.superadmin.admin')
@section('content')
<div class="row">
	<div class="col-sm-12">
                <div class="card" style="background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(72,191,45,1) 0%, rgba(56,196,90,1) 49%, rgba(0,212,255,1) 100%);">

                    <center><h4 class="card-title" style="color:white">Add Quotation</h4></center>                   
                    <label for="dob">New WorkOrder ID</label>
                    <label style="width: 200px; font-size: 30px; height: 40px; font-weight: bold">New =  {{ $neworderid }}</label>
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
                        <form action="{{ route('addworkorder')}}" method="POST" data-toggle="validator">
                        	@csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="dob">WorkOrder ID</label>
                                        <input style="width: 200px; font-size: 30px; height: 40px; font-weight: bold" type="text"  value="{{ $orderid }}" class="form-control" name="orderid"/>
                                    </div>
                                </div>  
                                <div class="col-md-3">                      
                                    <div class="form-group">
                                        <label>ProductID</label>
                                        <select style="width: 200px"  name="productid" class="selectpicker form-control package_select" data-style="py-0">
                                        @foreach($product as $productcta)      
                                            <option  value="{{ $productcta->productid }}">{{ $productcta->productname }}</option>
                                        @endforeach    
                                        </select>
                                    </div>
                                </div>    
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>CategoryID</label>
                                        <select name="categoryid" class="selectpicker form-control package_select" data-style="py-0">
                                        <option value="">Select a category</option>
                                        @foreach($category as $cta)      
                                            <option value="{{ $cta->id }}">{{ $cta->name }}</option>
                                        @endforeach    
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>SubCategory</label>
                                        <select style="width: 200px"  name="subcactegoryid" class="selectpicker form-control package_select" data-style="py-0">
                                        @foreach($subcategory as $subcta)      
                                            <option  value="{{ $subcta->id }}">{{ $subcta->subcategoriesname }}</option>
                                        @endforeach    
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Suppliarid</label>
                                        <select style="width: 200px"  name="suppliarid" class="selectpicker form-control package_select" data-style="py-0">
                                        @foreach($suppliar as $suppli)      
                                            <option  value="{{ $suppli->suppliarid }}">{{ $suppli->name }}</option>
                                        @endforeach    
                                        </select>
                                    </div>
                                </div>                         
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Unit Cost</label>
                                        <input style="width: 200px; font-size: 30px; height: 40px; font-weight: bold" type="text" name="unitcost" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Quentity</label>
                                        <input style="width: 200px; font-size: 30px; height: 40px; font-weight: bold" type="text" name="quentity" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Total Price</label>
                                        <input style="width: 200px; font-size: 30px; height: 40px; font-weight: bold" type="text" name="totalpurchaseprice" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>OrderDate</label>
                                        <input style="width: 200px; font-size: 30px; height: 40px; font-weight: bold" type="date" name="date" class="form-control">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Other</label>
                                        <input style="width: 200px; font-size: 30px; height: 40px; font-weight: bold" type="text" name="other" class="form-control">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>description</label>
                                        <input style="width: 200px; font-size: 30px; height: 40px; font-weight: bold" type="text" class="form-control" name="description">
                                        <div class="help-block with-errors"></div>
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