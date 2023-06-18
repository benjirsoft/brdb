@extends('backend.layout.superadmin.admin')
@section('content')
<div class="row">
	<div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Update Supplier</h4>
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
                        <form action="{{ route('suppliarupdate')}}" method="POST" data-toggle="validator">
                            @csrf
                            <div class="row"> 
                                <div class="col-md-6">                      
                                    <div class="form-group">
                                        <label>Suppliar ID</label>
                                        <input type="text" hidden value="{{ $findsuppliar->id }}" name="id" class="form-control" required>
                                        <input type="text" readonly value="{{ $findsuppliar->suppliarid }}" name="suppliarid" class="form-control" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" value="{{ $findsuppliar->name }}" name="name" class="form-control" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Company Name</label>
                                        <input type="text" name="companyname" value="{{ $findsuppliar->companyname }}" class="form-control" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control" name="address" rows="4">{{ $findsuppliar->address }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>MobileNo</label>
                                        <input type="text" value="{{ $findsuppliar->mobile }}" name="mobileno" class="form-control" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>                                
                            </div>                            
                            <button type="submit" class="btn btn-primary mr-2">Add Supplier</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
</div>	
@endsection	