@extends('backend.layout.superadmin.admin')
@section('content')
<div class="row">
	<div class="col-sm-12">
                <div class="card" style="background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(72,191,45,1) 0%, rgba(56,196,90,1) 49%, rgba(0,212,255,1) 100%);">
                    <div class="card-header d-flex justify-content-between">
                       
                            <h2 style="margin-left: 40%; font-size: 30px; color:white; font-weight:bold" class="card-title">Transfer Product</h2>
                      
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
                        <form action="{{ route('Transferproduct')}}" method="POST" data-toggle="validator">
                        	@csrf
                            <div class="row">
                            	<div class="col-md-3">                      
                                    <div class="form-group">
                                        <label>ProductID</label>
                                        <input type="text" style="width: 200px; font-size: 30px; height: 40px; font-weight: bold" name="productid" class="form-control" onblur="searchproduct()">
                                        <br>
                                         <input type="text" class="form-control" id="dob" style="width: 200px; font-size: 30px; font-weight: bold" name="productname"/>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Product Type</label>
                                        <select name="productype" class="selectpicker form-control" data-style="py-0">
                                            @foreach($producttype as $cta)      
                                            <option value="{{ $cta->id }}">{{ $cta->producttypes }}</option>
                                            @endforeach                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">                      
                                    <div class="form-group">
                                        <label>ShowroomID</label>
                                        <input type="text" style="width: 200px; font-size: 30px; height: 40px; font-weight: bold" name="showroomid" class="form-control" onblur="searchshowroom()">
                                        <br>
                                         <input type="text" class="form-control" id="dob" style="width: 300px; font-size: 30px; font-weight: bold" name="showroomname"/>

                                    </div>
                                </div> 

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Quentity</label>
                                        <input style="width: 200px;  font-size: 30px; height: 40px; font-weight: bold"  type="text" name="quentity"  class="form-control">
                                    </div>
                                </div>                        
                            </div>                            
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
</div>
@endsection	