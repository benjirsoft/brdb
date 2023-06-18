@extends('backend.layout.superadmin.admin')
@section('content')
<div class="row">
	<div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Add Product</h4>
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
                        <form action="{{ route('addproduct') }}" method="POST" data-toggle="validator">
                        	@csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ProductID</label>
                                        <input type="text" readonly value="{{ $Productid }}" class="form-control" name="productid" data-errors="Please Enter ProductID." required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input type="text" class="form-control" name="productname" data-errors="Please Enter Code." required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>  
                                 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category *</label>
                                        <select name="subcategory_id" class="selectpicker form-control package_select" data-style="py-0">
                                            @foreach($category as $cta)      
                                            <option value="{{ $cta->id }}">{{ $cta->name }}</option>
                                            @endforeach                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>SubCategory *</label>
                                        <select name="category_id" class="selectpicker form-control package_select" data-style="py-0">
                                            @foreach($subcategory as $subcta)      
                                            <option value="{{ $subcta->id }}">{{ $subcta->subcategoriesname }}</option>
                                            @endforeach   
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Product Type</label>
                                        <select name="productype" class="selectpicker form-control" data-style="py-0">
                                            @foreach($producttype as $cta)      
                                            <option value="{{ $cta->id }}">{{ $cta->producttypes }}</option>
                                            @endforeach                                           
                                        </select>
                                    </div>
                                </div>
                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Other</label>
                                        <input type="text" name="other" class="form-control" >
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description / Product Details</label>
                                        <textarea name="description" class="form-control" rows="4"></textarea>
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
@section('search')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>

$(document).ready(function() {
    $('.package_select').select2();
});

</script>
@endsection


