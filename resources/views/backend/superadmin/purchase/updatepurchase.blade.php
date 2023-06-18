@extends('backend.layout.superadmin.admin')
@section('content')
<div class="row">
	<div class="col-sm-12">
                <div class="card"  style="background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(72,191,45,1) 0%, rgba(56,196,90,1) 49%, rgba(0,212,255,1) 100%);">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Update Purchase</h4>
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
                        <form action="{{ route('updatepurchase')}}" method="POST" data-toggle="validator">
                        	@csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="dob">Purchase ID</label>
                                        <input hidden style="width: 200px;  font-size: 30px; height: 40px; font-weight: bold" type="text"  value="{{ $findpurchase->id }}" class="form-control" id="dob" name="id"/>
                                        <input style="width: 200px;  font-size: 30px; height: 40px; font-weight: bold" type="text"  value="{{ $findpurchase->purchaseid }}" class="form-control" id="dob" name="purchaseid"/>
                                    </div>
                                </div>
                                <div class="col-md-3">                      
                                    <div class="form-group">
                                        <label>OrderID</label>
                                        <input style="width: 200px;  font-size: 30px; height: 40px; font-weight: bold" type="text"   value="{{ $findpurchase->orderid }}" class="form-control" id="dob" data-errors="Please Enter Code." name="orderid"/>
                                        <div class="help-block with-errors"></div>

                                    </div>
                                </div>
                                <div class="col-md-3">                      
                                    <div class="form-group">
                                        <label>Order Date</label>
                                        <input style="width: 200px;  font-size: 30px; height: 40px; font-weight: bold" type="date"   value="{{ $findpurchase->orderdate }}" class="form-control" id="dob" data-errors="Please Enter Code." name="orderdate"/>
                                        <div class="help-block with-errors"></div>

                                    </div>
                                </div>  
                                <div class="col-md-3">                      
                                    <div class="form-group">
                                        <label>ProductID</label>
                                        <input style="width: 200px;  font-size: 20px; height: 40px; font-weight: bold" type="text"   value="{{ $findpurchase->productid }}" class="form-control" id="dob" data-errors="Please Enter Code." name="productid" required/>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-3">                      
                                    <div class="form-group">
                                        <label>Barcode</label>
                                        <input readonly style="width: 200px;  font-size: 20px; height: 40px; font-weight: bold" type="text"   value="{{ $findpurchase->barcode }}" class="form-control" id="dob" data-errors="Please Enter Code." name="barcode" required/>
                                        <div class="help-block with-errors"></div>

                                    </div>
                                </div>     
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select style="width: 200px"  name="categoryid" class="selectpicker form-control" data-style="py-0">
                                        @foreach($category as $cta)      
                                            <option style="font-size: 20px; height: 40px; font-weight: bold" value="{{ $cta->id }}">{{ $cta->name }}</option>
                                        @endforeach    
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>SubCategory</label>
                                        <select style="width: 200px"  name="subcategoryid" class="selectpicker form-control" data-style="py-0">
                                        @foreach($subcategory as $subcta)      
                                            <option style="font-size: 16px; height: 40px;" value="{{ $subcta->id }}">{{ $subcta->subcategoriesname }}</option>
                                        @endforeach    
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Suppliarid</label>
                                        <input style="width: 200px;  font-size: 17px; height: 40px; font-weight: bold" type="text"  value="{{ $findpurchase->suppliarid }}" class="form-control" id="dob" data-errors="Please Enter Code." name="suppliarid" required/>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Unit Cost</label>
                                        <input style="width: 200px;  font-size: 30px; height: 40px; font-weight: bold" type="text" data-errors="Please Enter" value="{{ $findpurchase->unitcost }}" name="unitcost" class="form-control" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Quentity</label>
                                        <input style="width: 200px;  font-size: 30px; height: 40px; font-weight: bold" type="text" data-errors="Please Enter" value="{{ $findpurchase->quentity }}" name="quentity" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Vat</label>
                                        <input style="width: 200px;  font-size: 30px; height: 40px; font-weight: bold"  value="{{ $findpurchase->vatid }}"  type="text" name="vat"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Total Purchase Price</label>
                                        <input value="{{ $findpurchase->totalprice }}" style="width: 200px;  font-size: 27px; height: 40px; font-weight: bold"  type="text" name="totalpurchaseprice" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Profit %</label>
                                        <input value="{{ $findpurchase->profite }}" style="width: 200px;  font-size: 27px; height: 40px; font-weight: bold"  type="text" name="profitpercentage" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Unit Sells Price</label>
                                        <input value="{{ $findpurchase->unitsellsprice }}" style="width: 200px;  font-size: 27px; height: 40px; font-weight: bold"  type="text" name="unitSellsprice" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Customer Price</label>
                                        <input value="{{ $findpurchase->cprice }}" style="width: 200px;  font-size: 27px; height: 40px; font-weight: bold" type="text" data-errors="Please Enter" name="cprice" class="form-control" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Other</label>
                                        <input type="text" value="{{ $findpurchase->other }}" name="other" class="form-control">
                                        
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>description</label>
                                        <input type="text" value="{{ $findpurchase->description }}" class="form-control" name="description">
                                        
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