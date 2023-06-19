@extends('backend.layout.showroominchage.admin')
@section('content')
    <div class="container" id="app">
        <form action="{{ route('cart')}}" method="get">
            @csrf
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
                      <input style="font-size:25px" placeholder="Search Product" type="text" v-model="selectedBarcode" class="form-control" id="barcode" xname="barcode" >
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
                                    <input type="hidden" :name="`product[${key}][id]`" :value="item.product_id" id="">
                                    <input type="hidden" :name="`product[${key}][price]`" :value="item.price" id="">
                                    <input type="hidden" :name="`product[${key}][supplier_id]`" :value="item.supplier_id" id="">
                                    <input type="hidden" :name="`product[${key}][barcode]`" :value="item.barcode" id="">
                                    <input type="hidden" :name="`product[${key}][vat]`" :value="item.vat" id="">
                                    <input class="qty_input" min="1" type="number" @keyup="qtykeyUp($event, item.price, key)" :name="`product[${key}][qty]`" value="1" id="">
                                </td>
                                <td>@{{item.vat }}</td>
                                <td>@{{item.price }}</td>
                                <td>@{{item.sub }}</td>
                                <td>
                                    <a href="javascript:void(0)" v-on:click="removeProduct(item.product_id)">Remove</a>
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

                          <div class="row">
                              <div class="col-md-6 mb-2" >
{{--                                  <input hidden style="font-size:30px; color:red" type="text" class="form-control" value="{{ $totalprice ?? 'N/A' }}" id="totalprice" name="totalprice">--}}
{{--                                  <input style="font-size:30px; color:red" type="text" class="form-control" value="{{ $totalamount ?? 'N/A' }}" id="totalamount" name="totalamount">--}}
                                  <input readonly style="font-size:30px; color:red" type="text" class="form-control" :value="totalProductPrice" id="total_amount" name="totalamount">
                                </div>
                                <div class="col-md-6 mb-2">
                                  <input readonly style="font-size:30px; color:red" type="text" class="form-control" :value="totalProductQty" placeholder="Vat" id="vat" name="total_qty">
                                </div>
                                  <div class="col-md-6 mb-2">
                                      <input readonly style="font-size:30px; color:red" type="text" class="form-control" :value="totalvat" placeholder="Vat" id="vat" name="total_vat">
                                  </div>
                                <div class="col-md-6 mb-2">
                                  <input style="font-size:15px;" type="number" placeholder="Discount" class="form-control" name="total_discount"  @keyup="discountCalculate">
                                </div>
                                <div v-if="discountValue" class="col-md-6">
                                      <input  style="font-size:15px" type="text" class="form-control" value="" placeholder="Customer Name" id="name" name="customer_name">
                                </div>
                                <div v-if="discountValue" class="col-md-6">
                                  <input  style="font-size:15px" type="text" placeholder="Mobile" class="form-control" id="stockpcs" name="customer_mobile">
                                </div>
                                <div v-if="discountValue" class="col-md-6" style="margin-top:5px">
                                    <input  style="font-size:15px" type="text" class="form-control" placeholder="refer" id="price" name="customer_refer">
                                </div>


                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                {{--                                      <select class="form-control" id="payment-method" name="paymentid" required>--}}
                                                @foreach($payment as $paymentinfo)
                                                    <div>
                                                        <input
                                                                v-on:change="checkPaymentMethod($event)"
                                                               :number_field="'{{$paymentinfo->id}}' != 1 ? true : false"
                                                               :input_name="'{{strtolower(str_replace(' ', '_',  $paymentinfo->name))}}'"
                                                               :pay_name="'{{ $paymentinfo->name }}'"
                                                                type="checkbox"
                                                                name="" id=""
                                                                value="{{ $paymentinfo->id }}"> {{ $paymentinfo->name }}
                                                    </div>
                                                @endforeach
                                                {{--                                      </select>--}}
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div v-for="item in paymentMethod" class="row">
                                                <div class="col-md-6">
                                                    <input
                                                            @keyup="calculateReturn($event)"
                                                            style="font-size:15px" type="number"
                                                           :placeholder="item.name"
                                                            class="form-control mb-2 payment_method_value" id="cardnumber"
                                                           :name="'payment_method['+item.input_name+']'">
                                                </div>
                                                <div class="col-md-6" v-if="item.number_field">
                                                    <input style="font-size:10px" type="text" :placeholder="item.name+ ' Number'" class="form-control mb-2" id="cardnumber"  :name="'card_number['+item.input_name+']'">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                              <div class="row">
                                  <div class="col-md-4">
                                      <input readonly style="font-size:25px; color:red; font-weight:bold;" type="text" placeholder="Pay" class="form-control" id="pay"
                                             name="customer_have_to_pay"
                                             v-model="customerHaveToPay"  required>
                                  </div>
                                  <div class="col-md-4">
                                      <input readonly style="font-size:25px; color:red; font-weight:bold;" type="text" placeholder="Return" class="form-control" id="return" name="return" v-model="returnToCustomer" required>
                                  </div>
                              </div>

                                <div class="col-md-12">
                                    <div class="form-group col-md-2">
                                        <button type="submit" style="margin-top:25px" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                          </div>

                  </div>
              </div>
        </form>
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
                returnToCustomer : 0,
                paymentMethod : [],
            },
            methods: {
                async searchProduct(){
                    let selectedProducts = this.selectedProducts;
                    // console.log(this.selectedProducts)
                    // if(checkBarcodeAdded == false){
                        let getproduct = await axios.post('search_product_by_barcode', {'barcode': this.selectedBarcode})
                        let product = getproduct.data;
                        this.selectedBarcode = ''
                        if(product) {
                            this.errorMsg = ''
                            let mkProduct = {
                                'barcode': product.barcode,
                                'product_name': product.productname,
                                'product_id': product.productid,
                                'vat': product.vat,
                                'price': product.price,
                                'sub' : product.price,
                                'supplier_id' : product.suppliarid,
                                'qty': 1,
                            }
                            selectedProducts.push(mkProduct)
                            // console.log(this.selectedProducts);
                            await this.qtykeyUp()
                        }else {
                            this.errorMsg = 'Product not found'
                        }
                    // }else {
                    //     this.errorMsg = 'Product already added'
                    // }




                },

                removeProduct(product_id){
                    let selectedProducts = this.selectedProducts;
                    this.selectedProducts = selectedProducts.filter(function(item){
                        return item.product_id != product_id
                    })
                     this.qtykeyUp()
                },


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
                    let payment_method_value = document.querySelectorAll('input.payment_method_value')
                    let sum = 0;
                    for(var i=0; i < payment_method_value.length; i++){
                        sum += Math.round(payment_method_value[i].value)
                    }
                    this.customerHaveToPay = Math.round(sum);
                    this.returnToCustomer = this.customerHaveToPay-this.totalProductPrice
                },

                checkPaymentMethod($event){
                    let value = $event.target.value
                    let pay_name = $event.target.getAttribute('pay_name')
                    let number_field = $event.target.getAttribute('number_field')
                    let input_name = $event.target.getAttribute('input_name')
                    let paymentMethodPush = this.paymentMethod
                    if($event.target.checked == true){
                        let mkArr = {
                            'name' : pay_name,
                            'number_field':number_field,
                            'id' : value,
                            'input_name' : input_name,
                        }
                        paymentMethodPush.push(mkArr)
                    }else {
                        this.paymentMethod = paymentMethodPush.filter(function(item){
                            return item.id != value
                        })
                    }

                    // console.log(this.paymentMethod)

                }

            },
            created(){

            },

        })
    </script>
@endsection
