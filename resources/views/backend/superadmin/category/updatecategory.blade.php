@extends('backend.layout.superadmin.admin')
@section('content')
<div class="row">
	<div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Update category</h4>
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
                        <form action="{{ route('updatecategory')}}" method="POST" data-toggle="validator">
                            @csrf
                            <div class="row">  
                                <div class="col-md-12">                      
                                    <div class="form-group">
                                        <label>Category Name *</label>
                                        <input type="text" hidden name="id" value="{{ $findid->id}}">
                                        <input type="text" value="{{ $findid->name }}" name="categoryname" class="form-control" placeholder="Enter category Name" required>
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