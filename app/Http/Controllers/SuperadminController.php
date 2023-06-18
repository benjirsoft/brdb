<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Suppliarinfo;
use App\Models\Productinfo;
use App\Models\ProductCategory;
use App\Models\Stock;
use App\Models\Purchaseinfo;
use App\Models\StockInfo;
use App\Models\Posinfo;
use App\Models\Corporate_sell;

class SuperadminController extends Controller
{


    public function transferproduct(Request $request)
    {

        $productid = $request->input('productid');

        $producttype = $request->input('productype');

        $showroomid = $request->input('showroomid');

        $quentity = $request->input('quentity');


        $findstock = Stock::where('productid', $productid)->first();

        $stock = $findstock->stock;

        if($quentity > $stock)
        {

            return redirect()->back()->withErrors('sorry, Your Do not Have Sufficient Product');
        }
        else
        {

            $findstock->stock -= $quentity;
            $findstock->save();

        }
        

        $findshowroomandproduct = StockInfo::where('showroomid', $showroomid)->where('productid', $productid)->first();

        if($findshowroomandproduct && $producttype==1)
        {

            $findshowroomandproduct->quentitypc += $quentity; 
            $findshowroomandproduct->save();

        }
        elseif ($findshowroomandproduct && $producttype==2){

            
            $findshowroomandproduct->weightquentity += $quentity; 
            $findshowroomandproduct->save();            
        }

        





        return redirect()->back()->with('success', 'Transfer Your Product');    
        
    }

    public function transferproductform()
    {
        return view('backend.superadmin.stock.transferproductform');
    }
    public function formpage()
    {


        $sellsprice = Purchaseinfo::all()->sum('Sellsprice');
        $totalpurchaseprice = Purchaseinfo::all()->sum('totalprice');
        $totalproductstock = Stock::all()->sum('stock');
        $totalsuppliar = Suppliarinfo::all()->count();
        $totalproduct = Productinfo::all()->count();
        $totalcategory =ProductCategory::all()->count();
        $totalsell = Posinfo::all()->sum('totalamount');
        $totalvat = Posinfo::all()->sum('totalvat');
        $totalsellsprice = Purchaseinfo::all()->sum('cprice');
        $coporatesell = Corporate_sell::all()->sum('amount');

        return view('backend.superadmin.dashboard.index', compact('sellsprice', 'totalpurchaseprice', 'totalproductstock', 'totalsuppliar', 'totalproduct', 'totalcategory', 'totalsell', 'totalvat', 'totalsellsprice', 'coporatesell'));
    }


    public function suppliarbaseprice()
    {

        

        
    }   
}
