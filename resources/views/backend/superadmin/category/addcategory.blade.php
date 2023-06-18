@extends('backend.layout.superadmin.admin')
@section('content')
<div class="row">
	<div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Add category</h4>
                        </div>
                    </div>
                    <template>
                        <div class="card-body">
                            <form @submit.prevent="saveItem" data-toggle="validator">
                                <div class="row">  
                                    <div class="col-md-12">                      
                                        <div class="form-group">
                                            <label>Category Name *</label>
                                            <input type="text" id="categoryname" name="categoryname" class="form-control" placeholder="Enter category Name" required>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>                            
                                <button type="submit" class="btn btn-primary mr-2">Save</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </form>
                        </div>
                    </template>    
                </div>
            </div>
</div>
@endsection	