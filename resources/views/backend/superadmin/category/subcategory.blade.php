@extends('backend.layout.superadmin.admin')
@section('content')
<div class="row">
	<div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <a href="{{ route('addsubcategorylist')}}" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>list SubCategory</a>
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
                        <form action="{{ route('addsubcategory')}}" method="POST" data-toggle="validator">
                            @csrf
                            <div class="row">  
                                <div class="col-md-12">                      
                                    <div class="form-group">
                                        <label>Subcategory Name</label>
                                        <input type="text" name="subcategory" class="form-control" placeholder="Enter subcategory Name" required>
                                        <div class="help-block with-errors"></div>
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