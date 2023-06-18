<?php

namespace App\Http\Controllers\Sell;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product_stocke;
use App\Models\User;
use App\Models\Cartproduct;
use App\Models\Dailysell;
use App\Models\Dailyvat;
use App\Models\Cartid;
use App\Models\Posinfo;
use App\Models\Cardinfo;
use App\Models\Customer;
use App\Models\DiscountCustomer;
use App\Models\Purchaseinfo;
use App\Models\Paymentbalance;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class SellslosicalController extends Controller
{

    public function deletecacrt($id)
    {
        $findproduct = Cartproduct::where('id', $id)->first();


        if($findproduct)
        {
            $findproduct->delete();

            return redirect()->back()->with('success', 'Product Delete Success');
        }
        else
        {
            return redirect()->back()->withErrors('sorry', 'Id Not Found');
        }

        

    }

    public function sellsconfirm(Request $request)
    {


        $validator = Validator::make($request->all(),[

            'paymentid' => 'required',   

        ]);

       if ($validator->fails()) {
        
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $cartids = Session()->get('cartid');
        $vat = Session()->get('vat');
        $qty = Session()->get('qty');
        $price = Session()->get('price');
        $totalamount = Session()->get('totalamount');
        

        $amount = Cartinfo::where('cartid', $cartids)->sum('totalamount');
        $vat = Cartinfo::where('cartid', $cartids)->sum('vat');

        if ($vat == 0 && $amount == 0) {
            return redirect()->back()->withErrors('error', 'Please add products before submitting the Pos.');
        }

        $dailysells = new Dailysell;
        $dailysells->cartid = $cartids;
        $dailysells->paymentid = $request->paymentid;
        $dailysells->creditecard = $request->creditecard;
        $dailysells->vatamount = $vat;
        $dailysells->amount = $amount;
        $dailysells->save();


        $invoicedata = Cartinfo::where('cartid', $cartids)->get();


        

      


        $cartiddelete = DB::table('cartids')->delete();


        session()->forget('cartid');
        session()->forget('vat');
        session()->forget('qty');
        session()->forget('totalamount');
        session()->forget('barcode');

        return redirect()->route('sellsform');
}
    public function preview()
    {

        $cartids = Session()->get('cartid');

        $findcart = Cartinfo::where('cartid', $cartids)->get();

        return view('backend.showroomincharge.Sells.cart', compact('findcart'));

    }
    public function generatecartid()
    {
        $cartid = session()->get('cartid');

        if (!$cartid) {
            do {
                $numberPart = mt_rand(100000, 999999); // Generate a 6-digit random number
                $textPart = strtoupper(substr(uniqid(), -4)); // Generate a 4-character unique string

                $cartid = $numberPart . $textPart; // Combine the two parts to create the potential transaction ID

                // Check if the transaction ID already exists in the database
                $existingTransaction = Cartproduct::where('cartid', $cartid)->first();
            } while ($existingTransaction); // Repeat the loop if the transaction ID already exists

            session()->put('cartid', $cartid);
        }

        return $cartid;
    }

    


    public function addtocart(Request $request)
    {


        $cartids = Session()->get('cartid');


        

        //$discountamount = Posinfo::where('cartid', $cartids)->first();

        //$vat = $discountamount->totalvat;

        //$discounts = $discountamount->discount;

        //$netamount = $discountamount->totalamount;



        //if (!empty($discounts)) {
            //$discount_amount = ($discounts / 100) * $totalprice;
        //}

        //$invoicedata = Cartproduct::where('cartid', $cartids)->get();
        //$customer = Customer::where('cartid', $cartids)->get();

            // Set up Dompdf options (e.g. for including images)
        

    

        $cartiddelete = DB::table('cartids')->delete();

        session()->forget('cartid');
    
        return redirect()->back();
    }

    

    
    public function search(Request $request)
    {

      $barcode = strval($request->input('barcode'));

      $product = Product_stocke::where('barcode', $barcode)->first();
        if (!$product) {
            return redirect()->back()->withErrors('sorry, product not found');
        }

        $id = $product->productid;
        $prices = $product->price;
        $vatparcentage = $product->vat;

        $vatamount = round(($vatparcentage / 100) * $prices);


        $carid = $this->generatecartid();

        Session::put([
            'cartid' => $carid,
            'barcode' => $barcode,
        ]);

        $cartids = Session()->get('cartid');
        $barcode = Session()->get('barcode');

        $suppliarid = Purchaseinfo::where('barcode', $barcode)->first();

        $suppliar = $suppliarid->suppliarid;

        $checkquentity = Product_stocke::where('barcode', $barcode)->first();

        $qntity = $checkquentity->stock;

        if ( 1 > $qntity) {
            return redirect()->back()->withErrors('Insufficient product quantity');
        }

        $qty = 1;


        $addproduct = new Cartproduct;
        $addproduct->cartid = $carid;
        $addproduct->barcode = $barcode;
        $addproduct->suppliarid = $suppliar;
        $addproduct->productid = $id;
        $addproduct->qty = $qty;
        $addproduct->vat = $vatamount;
        $addproduct->price = $prices;
        $addproduct->created_at = $request->date;
        $addproduct->save();

        //stockupdate here 
        
        $stocks = Product_stocke::where('barcode', $barcode)->first();
        if ($stocks) {
            $stocks->stock -= $qty;
            $stocks->save();
        }

        $cartid = new Cartid;
        $cartid->cartids = $cartids;
        $cartid->save();

        return redirect()->back()->with('success', 'product added successfully');

        
    } 


      



   

    public function sells(Request $request)
    {


        $sells = new Sellinfo;

        $sells->userid = $request->userid;
        $sells->productid = $request->productid;
        $sells->unitprice = $request->unitprice;
        $sells->quentity = $request->quentity;
        $sells->discount = $request->discount;
        $sells->totalprice = $request->totalprice;
        $sells->showroomid = $request->showroomid;
        sells->save();



    }
}    



    // Get total sales for the current day
//$todaySales = DB::table('sales')
    //->select(DB::raw('SUM(total_amount) as total_sales'))
//whereDate('created_at', today())
//first();

// Get total sales for the current week
//$weekSales = DB::table('sales')
//select(DB::raw('SUM(total_amount) as total_sales'))
//whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
//->first();

// Get total sales for the current month
//$monthSales = DB::table('sales')
   // ->select(DB::raw('SUM(total_amount) as total_sales'))
//->whereMonth('created_at', now()->month)
  //  ->first();



//To add buttons to a calendar to show the total sales for the current day, week, and month, you can use JavaScript and Ajax to update the sales totals without refreshing the page.

//'s an example of how you can create a button group for the different time periods and use Ajax to update the sales totals:

//php
//Copy code// HTML code for the calendar and the button group -->/
//<div id="calendar"></div>
//<div id="sales_totals">
  //<button id="today_sales">Today</button>
  //<button id="week_sales">This Week</button>
  //<button id="month_sales">This Month</button>
  //<div id="sales_results"></div>
//</div>

//<!-- JavaScript code to handle the button clicks and update the sales totals -->
//<script>
  //$(document).ready(function() {
    // Set up event listeners for the button clicks
    //$('#today_sales').click(function() {
      //updateSales('today');
    //});
    //$('#week_sales').click(function() {
      //updateSales('week');
    //});
    //$('#month_sales').click(function() {
      //updateSales('month');
    //});

    // Function to update the sales totals using Ajax
    //function updateSales(period) {
      //$.ajax({
        //type: 'GET',
        //url: '/sales/' + period,
        //success: function(response) {
          // Update the sales totals on the page
          //$('#sales_results').html(response);
        //}
      //});
    //}
  //});
//</script>
// this example, we have a calendar and a button group for the different time periods. When a button is clicked, we call the updateSales() function with the corresponding period (today, week, or month).

//The updateSales() function uses Ajax to call a route in your Laravel application that returns the sales totals for the selected period. You will need to create a route and a controller method to handle these requests.

//Here's an example of how you can create the route and the controller method in Laravel:

//rust
//Copy code
// Route definition in routes/web.php
//Route::get('/sales/{period}', 'SalesController@getSales');

// Controller method in app/Http/Controllers/SalesController.php
//public function getSales($period)
//{
    //switch ($period) {
       // case 'today':
//$sales = DB::table('sales')
               // ->select(DB::raw('SUM(total_amount) as total_sales'))
               // ->whereDate('created_at', today())
//->first();
//break;
        //case 'week':
//$sales = DB::table('sales')
                //->select(DB::raw('SUM(total_amount) as total_sales'))
                //->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
                //->first();
           // break;
        //case 'month':
           // $sales = DB::table('sales')
                //->select(DB::raw('SUM(total_amount) as total_sales'))
//->whereMonth('created_at', now()->month)
               // ->first();
            //break;
//default:
//$sales = null;
//break;
//

    // Return the sales totals as a formatted string
    //return number_format($sales->total_sales, 2);//
//In this example, we have defined a route that takes a parameter for the period (today, week, or month), and a controller method that retrieves the sales totals for the selected period using the same queries we used earlier. We then format the result as a string using number_format() and return it to the Ajax call.

// you have set up the button group, the Ajax call, and the route and controller method, you can display the total sales for the selected period in the sales_results div on the page.
