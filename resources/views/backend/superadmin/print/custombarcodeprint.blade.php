<div class="row">
	<div class="col-sm-12">
                <div class="card" style="background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(72,191,45,1) 0%, rgba(56,196,90,1) 49%, rgba(0,212,255,1) 100%);">

                    <center><h4 class="card-title" style="color:white">Add Quotation</h4></center>                   
                    
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
                        <form action="#" method="POST" data-toggle="validator">
                        	@csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="dob">barcode</label>
                                        <input style="width: 200px; font-size: 30px; height: 40px; font-weight: bold" type="text" class="form-control" name="orderid"/>
                                    </div>
                                </div>
                                                         
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Productid</label>
                                        <input style="width: 200px; font-size: 30px; height: 40px; font-weight: bold" type="text" name="unitcost" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Quentity</label>
                                        <input style="width: 200px; font-size: 30px; height: 40px; font-weight: bold" type="text" name="quentity" class="form-control">
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