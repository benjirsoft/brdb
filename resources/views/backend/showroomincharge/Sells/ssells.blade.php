@extends('backend.layout.showroominchage.admin')
@section('content')
    <div class="container" id="app">
              <div class="row">
                <div class="col-md-12">
                    <div v-if="errorMsg" class="alert alert-danger">
                        <span v-html="errorMsg"></span>
                    </div>
                  @if ($errors->any())
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                    @endif
{{--                  <form action="{{ route('addtocart')}}" method="get">--}}
                    @csrf
                    <div class="form-group">
                      <input style="font-size:25px" placeholder="Search Product" type="date" class="form-control" id="barcode" name="date" value="{{$selectedDate}}" required>
                    </div>
                    <div class="form-group">
                      <input style="font-size:25px" placeholder="Search Product" type="text" v-model="selectedBarcode" class="form-control" id="barcode" name="barcode" required>
                    </div>
                    <button type="button" class="btn btn-primary" v-on:click="searchProduct()">Search</button>
                    <button class="btn btn-danger" onclick="reloadPage()">Reload Page</button>
{{--                  </form>--}}
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
                                <th>Sub Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr v-if="selectedProducts" v-for="(item, key) in selectedProducts" :key="key">
                                <td>@{{item.product_name }}</td>
                                <td>
                                    <input class="qty_input" min="1" type="number" @keyup="qtykeyUp($event, item.price, key)" value="1" id="">
                                </td>
                                <td>@{{item.vat }}</td>
                                <td>@{{item.price }}</td>
                                <td>@{{item.sub }}</td>
                                <td>
                                    <a href="">Remove</a>
                                </td>
                            </tr>

                            <?php /*
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
                            */ ?>

                        </tbody>
                    </table>
                  </div>
                  <div class="col-md-4">
                      <form action="{{ route('cart')}}" method="get">
                          @csrf
                          <div class="row">
                              <div class="col-md-6" style="margin-top:3px">
{{--                                  <input hidden style="font-size:30px; color:red" type="text" class="form-control" value="{{ $totalprice ?? 'N/A' }}" id="totalprice" name="totalprice">--}}
{{--                                  <input style="font-size:30px; color:red" type="text" class="form-control" value="{{ $totalamount ?? 'N/A' }}" id="totalamount" name="totalamount">--}}
                                  <input style="font-size:30px; color:red" type="text" class="form-control" :value="totalProductPrice" id="totalamount" name="totalamount">
                                </div>
                                <div class="col-md-6">
                                  <input style="font-size:30px; color:red" type="text" class="form-control" :value="totalProductQty" placeholder="Vat" id="vat" name="vat">
                                </div>
                                  <div class="col-md-6">
                                      <input style="font-size:30px; color:red" type="text" class="form-control" :value="totalvat" placeholder="Vat" id="vat" name="vat">
                                  </div>
                                <div class="col-md-12 mb-2">
                                  <input style="font-size:15px; margin-top:2px" type="number" placeholder="Discount" class="form-control"  @keyup="discountCalculate">
                                </div>
                                  <div v-if="discountValue" class="col-md-6" style="margin-top:2px">
                                      <input  style="font-size:15px" type="text" class="form-control" value="" placeholder="Customer Name" id="name" name="name">
                                  </div>
                                  <div v-if="discountValue" class="col-md-6">
                                      <input  style="font-size:15px" type="text" placeholder="Mobile" class="form-control" id="stockpcs" name="mobile">
                                  </div>
                                    <div v-if="discountValue" class="col-md-6" style="margin-top:5px">
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
                                    <input  style="font-size:25px; color:red; font-weight:bold;" type="text" placeholder="Pay" class="form-control" id="pay" name="pay" @keyup="calculateReturn($event)" required>
                                </div>
                                <div class="col-md-4">
                                    <input  style="font-size:25px; color:red; font-weight:bold;" type="text" placeholder="Return" class="form-control" id="return" name="return" v-model="returnToCustomer" required>
                                </div>
                                <div class="form-group col-md-2">
                                  <button type="submit" style="margin-top:25px" class="btn btn-primary">Save</button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
    </div>
@endsection


@section('script')
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"></script>
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                selectedBarcode : '',
                selectedProducts : [],
                errorMsg : '',
                totalProductPrice : 0,
                totalProductQty : 0,
                discountValue : 0,
                totalvat : 0,
                customerHaveToPay: 0,
                returnToCustomer : 0
            },
            methods: {
                async searchProduct(){
                    let getproduct = await axios.post('search_product_by_barcode', {'barcode': this.selectedBarcode})
                    let product = getproduct.data;
                    this.selectedBarcode = ''
                    if(product) {
                        this.errorMsg = ''
                        let mkProduct = {
                            'barcode': product.barcode,
                            'product_name': product.productname,
                            'vat': product.vat,
                            'price': product.price,
                            'sub' : product.price,
                            'qty': 1,
                        }
                        let selectedProducts = this.selectedProducts;
                        selectedProducts.push(mkProduct)
                        // console.log(this.selectedProducts);
                        await this.qtykeyUp()
                    }else {
                        this.errorMsg = 'Product not found'
                    }
                },
                /*
                sumTotal(){
                    let sum = 0;
                    let sumQty = 0;
                    let sumVat = 0;
                    this.selectedProducts.forEach(function(item){
                        sum +=item.price;
                        sumQty +=item.qty;
                        sumVat += item.price*item.vat/100;
                    })
                    this.totalProductPrice = sum;
                    this.totalProductQty = sumQty;
                    this.totalvat = sumVat;
                },
                */

                qtykeyUp($event = null, getPrice = null, key = null){
                    // alert($event.target.value)
                    let totalQty = 0;
                    let total_price = 0;
                    let sum_vat = 0;
                    if(getPrice != null){
                        let qtyInput = document.querySelectorAll('.qty_input');
                        let priceInput = document.querySelectorAll('.price_input');
                        for(var i = 0; i < qtyInput.length; i++){
                            this.selectedProducts[key].qty = Math.round($event.target.value)
                            this.selectedProducts[key].sub = $event.target.value*getPrice
                        }
                    }
                    this.selectedProducts.forEach(function(item){
                        total_price += item.sub
                        totalQty += item.qty
                        sum_vat += (item.price*item.vat/100)*item.qty;
                    })
                    this.totalProductQty = totalQty

                    this.totalProductPrice = Math.round(total_price)
                    this.totalvat = sum_vat;
                },


                discountCalculate($event){
                    this.discountValue = $event.target.value;

                    let discountPrice = this.totalProductPrice*this.discountValue/100
                    this.totalProductPrice = Math.round(this.totalProductPrice-discountPrice)

                    let vatCalculation = this.totalvat*this.discountValue/100
                    this.totalvat = (this.totalvat-vatCalculation).toFixed(2);
                },
                calculateReturn($event){
                    this.customerHaveToPay = $event.target.value;
                    this.returnToCustomer = this.totalProductPrice- this.customerHaveToPay
                }

            },
            created(){

            },

        })
    </script>
@endsection
