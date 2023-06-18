@extends('backend.layout.superadmin.admin')
@section('content')
<div class="row">
	<div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Add Showroom</h4>
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
                        <form action="{{ route('addshowroom') }}" method="POST" data-toggle="validator">
                        	@csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Showroom ID</label>
                                        <input type="text" readonly value="{{ $showroomid }}" class="form-control" name="showroomid" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Showroom Name</label>
                                        <input type="text" class="form-control" name="showroomname" data-errors="Please Enter Code." required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>  
                                 
                                
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>address</label>
                                        <input type="text" name="address" class="form-control" >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <textarea name="mobile" class="form-control" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>                            
                            <button type="submit" class="btn btn-primary mr-2">Add Product</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
</div>	
@endsection	