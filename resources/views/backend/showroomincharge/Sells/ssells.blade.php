@extends('backend.layout.showroominchage.admin')
@section('content')
    <div class="container">
              <div class="row">
                <div class="col-md-12">
                  @if ($errors->any())
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                    @endif 
                  <form action="{{ route('addtocart')}}" method="get">
                    @csrf
                    <div class="form-group">
                      <input style="font-size:25px" placeholder="Search Product" type="date" class="form-control" id="barcode" name="date" required>
                    </div>
                    <div class="form-group">
                      <input style="font-size:25px" placeholder="Search Product" type="text" class="form-control" id="barcode" name="barcode" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                    <button class="btn btn-danger" onclick="reloadPage()">Reload Page</button>
                  </form>
                </div>
              </div>
              <div class="row">
                  <div class="col-md-8">
                      <table class="table table-hover" style="font-size:15px">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Vat</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                             @if (!empty($cartproduct))
                             @foreach ($cartproduct as $product)
                                <tr>
                                  <td>{{ $product->productinfo->productname }}</td>
                                  <td>{{ $product->qty }}</td>
                                  <td>{{ $product->vat }}</td>
                                  <td>{{ $product->price }}</td>
                                  <td>
                                    <a  href="{{ route('cartdelete', ['id' => $product->id]) }}">Remove</a>
                                  </td>
                                </tr>
                              @endforeach
                            @else
                              <tr>
                                <td colspan="5" class="text-center">No products added to cart</td>
                              </tr>
                            @endif

                        </tbody>
                    </table>
                  </div>
                  <div class="col-md-4">
                      <form action="{{ route('cart')}}" method="get">
                          @csrf
                          <div class="row">
                              <div class="col-md-6" style="margin-top:3px">
                                  <input hidden style="font-size:30px; color:red" type="text" class="form-control" value="{{ $totalprice ?? 'N/A' }}" id="totalprice" name="totalprice">
                                  <input style="font-size:30px; color:red" type="text" class="form-control" value="{{ $totalamount ?? 'N/A' }}" id="totalamount" name="totalamount">
                                </div>
                                <div class="col-md-6">
                                  <input style="font-size:30px; color:red" type="text" class="form-control" value="{{ $totalvat ?? 'N/A' }}" placeholder="Vat" id="vat" name="vat">
                                </div>
                                <div class="col-md-12">
                                  <input style="font-size:15px; margin-top:2px" type="text" placeholder="Discount" class="form-control" id="discount" name="discount">
                                </div>
                              <div class="col-md-6" style="margin-top:2px">
                                  <input  style="font-size:15px" type="text" class="form-control" value="" placeholder="Customer Name" id="name" name="name">
                              </div>
                              <div class="col-md-6">
                                  <input  style="font-size:15px" type="text" placeholder="Mobile" class="form-control" id="stockpcs" name="mobile">
                              </div>
                                <div class="col-md-6" style="margin-top:5px">
                                    <input  style="font-size:15px" type="text" class="form-control" placeholder="refer" id="price" name="refer">
                                </div>
                                <div class="form-group">
                                  <select class="form-control" id="payment-method" name="paymentid" required>
                                    @foreach($payment as $paymentinfo)      
                                      <option style="font-size: 20px; height: 40px; font-weight: bold" value="{{ $paymentinfo->id }}">{{ $paymentinfo->name }}</option>
                                    @endforeach  
                                  </select>
                                </div>
                                <div class="col-md-4">
                                    <input  style="font-size:15px" type="text" placeholder="card" class="form-control" id="cardnumber" name="cardnumber">
                                </div>
                                <div class="col-md-4">
                                    <input  style="font-size:25px; color:red; font-weight:bold;" type="text" placeholder="Pay" class="form-control" id="pay" name="pay" required>
                                </div>
                                <div class="col-md-4">
                                    <input  style="font-size:25px; color:red; font-weight:bold;" type="text" placeholder="Return" class="form-control" id="return" name="return" required>
                                </div>
                                <div class="form-group col-md-2">
                                  <button type="submit" style="margin-top:25px" class="btn btn-primary">Save</button>
                              </div>
                          </div>
                          </div>
                      </form>
                  </div> 
              </div>
    </div>               
@endsection	