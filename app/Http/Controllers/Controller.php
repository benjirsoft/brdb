<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Productinfo;
use App\Models\ProductCategory;
use App\Models\Suppliarinfo;
use App\Models\ShowroomInfo;
use App\Models\Stock;
use App\Models\Vat;
use App\Models\Subcategory;
use App\Models\Producttype;
use App\Models\Paymentinfo;
use App\Models\Cartproduct;
use App\Models\Cartid;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

   

    public  function __construct(Request $request)
    {
        

         if(config('app.env') === 'production') {
            \URL::forceScheme('https');
       }


        $product = Productinfo::take(100)->get();
        View::share('product', $product);

         $category = ProductCategory::take(100)->get();
        View::share('category', $category);


        $suppliar = Suppliarinfo::take(2000)->get();

        View::share('suppliar', $suppliar);


        $showroom = ShowroomInfo::take(100)->get();

        View::share('showroom', $showroom);


        $stock = Stock::take(2000)->get();

        View::share('stock', $stock);


        $producttype = Producttype::take(2000)->get();

        View::share('producttype', $producttype); 

        $vat = Vat::take(20)->get();

        View::share('vat', $vat);  


        $subcategory = Subcategory::take(100)->get();

        View::share('subcategory', $subcategory);

        $payment = Paymentinfo::orderBy('created_at', 'desc')->latest()->get();

        View::share('payment', $payment);

        
        $cart = Cartid::all();

        foreach ($cart as $cartid) {
            $cartinfo = $cartid->cartids;
            // Check if $cartinfo is not null
            if (!is_null($cartinfo)) {
                $totalamount = Cartproduct::where('cartid', $cartinfo)->sum('price');
                // Do something with $totalamount
                 View::share('totalamount', $totalamount);
            }
        }

        foreach ($cart as $cartid) {
            $cartinfo = $cartid->cartids;
            // Check if $cartinfo is not null
            if (!is_null($cartinfo)) {
                $totalprice = Cartproduct::where('cartid', $cartinfo)->sum('price');
                // Do something with $totalamount
                 View::share('totalprice', $totalprice);

            }
        }

        foreach ($cart as $cartid) {
            $cartinfo = $cartid->cartids;
            // Check if $cartinfo is not null
            if (!is_null($cartinfo)) {
                $totalvat = Cartproduct::where('cartid', $cartinfo)->sum('vat');
                // Do something with $totalamount
                 View::share('totalvat', $totalvat);
            }
        }

         foreach ($cart as $cartidss) {
            $cartin = $cartidss->cartids;
            // Check if $cartinfo is not null
            if (!is_null($cartin)) {
                $cartproduct = Cartproduct::where('cartid', $cartinfo)->get();
                View::share('cartproduct', $cartproduct);

                
            }
        }

    }
}
