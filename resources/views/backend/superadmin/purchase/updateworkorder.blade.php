@extends('backend.layout.superadmin.admin')
@section('content')
<div class="row">
	<div class="col-sm-12">
                <div class="card" style="background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(72,191,45,1) 0%, rgba(56,196,90,1) 49%, rgba(0,212,255,1) 100%);">

                    <center><h4 class="card-title" style="color:white">Update Workorder</h4></center>        
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
                        <form action="{{ route('workorderupdate')}}" method="POST" data-toggle="validator">
                        	@csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="dob">WorkOrder ID</label>
                                        <input hidden style="width: 200px; font-size: 30px; height: 40px; font-weight: bold" type="text"  value="{{ $findworkorder->id }}" class="form-control" name="id"/>
                                        <input style="width: 200px; font-size: 30px; height: 40px; font-weight: bold" type="text"  value="{{ $findworkorder->orderid }}" class="form-control" name="orderid"/>
                                    </div>
                                </div>  
                                <div class="col-md-3">                      
                                    <div class="form-group">
                                        <label>ProductID</label>
                                        <input style="width: 200px; font-size: 30px; height: 40px; font-weight: bold" type="text" value="{{ $findworkorder->productid }}" name="productid" class="form-control">

                                    </div>
                                </div>    
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>CategoryID</label>
                                        <select name="categoryid" class="selectpicker form-control" data-style="py-0">
                                        @foreach($category as $cta)      
                                            <option value="{{ $cta->id }}">{{ $cta->name }}</option>
                                        @endforeach    
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>SubCategory</label>
                                        <select style="width: 200px"  name="subcactegoryid" class="selectpicker form-control" data-style="py-0">
                                        @foreach($subcategory as $subcta)      
                                            <option style="font-size: 17px; height: 30px; font-weight: bold" value="{{ $subcta->id }}">{{ $subcta->subcategoriesname }}</option>
                                        @endforeach    
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Suppliarid</label>
                                        <input style="width: 200px; font-size: 30px; height: 40px; font-weight: bold" type="text" value="{{ $findworkorder->suppliarid }}" name="suppliarid" class="form-control">
                                    </div>
                                </div>                         
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Unit Cost</label>
                                        <input style="width: 200px; font-size: 30px; height: 40px; font-weight: bold" type="text" value="{{ $findworkorder->unitcost }}" name="unitcost" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Quentity</label>
                                        <input style="width: 200px; font-size: 30px; height: 40px; font-weight: bold" type="text" value="{{ $findworkorder->quentity }}" name="quentity" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Total Price</label>
                                        <input style="width: 200px; font-size: 30px; height: 40px; font-weight: bold" value="{{ $findworkorder->totalprice }}" type="text" name="totalpurchaseprice" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>date</label>
                                        <input style="width: 200px; font-size: 30px; height: 40px; font-weight: bold" value="{{ $findworkorder->date }}" type="date" name="date" class="form-control">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Other</label>
                                        <input style="width: 200px; font-size: 30px; height: 40px; font-weight: bold" value="{{ $findworkorder->other }}" type="text" name="other" class="form-control">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>description</label>
                                        <input style="width: 200px; font-size: 30px; height: 40px; font-weight: bold" value="{{ $findworkorder->description }}" type="text" class="form-control" name="description">
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