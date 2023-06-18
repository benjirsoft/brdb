<?php

namespace App\Http\Controllers\Purchasebarcode;

use App\Http\Controllers\Controller;
use App\Models\Posinfo;
use App\Models\SuppliarInfo;
use Illuminate\Http\Request;
use App\Models\Purchaseinfo;
use App\Models\StockInfo;
use App\Models\Workorder;
use App\Models\Stock;
use App\Models\Sellsinfo;
use App\Models\ShowroomInfo;
use App\Models\Purchasecart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use App\Models\Purchasegroup;


class PurchasebarcodelosicalController extends Controller
{

    public function updatepurchase(Request $request)
    {

        $id = $request->input('id');

        $purchaseid = Purchaseinfo::where('id', $id)->first();

        if($purchaseid)
        {

            $purchaseid->orderid = $request->orderid;
            $purchaseid->purchaseid = $request->purchaseid;
            $purchaseid->productid = $request->productid;
            $purchaseid->barcode = $request->barcode;
            $purchaseid->orderdate = $request->orderdate;
            $purchaseid->categoryid = $request->categoryid;
            $purchaseid->subcategoryid = $request->subcategoryid;
            $purchaseid->suppliarid = $request->suppliarid;
            $purchaseid->unitcost = $request->unitcost;
            $purchaseid->unitSellsprice = $request->unitSellsprice;
            $purchaseid->quentity = $request->quentity;
            $purchaseid->profite = $request->profitpercentage;
            $purchaseid->vatid  =  $request->vat;
            $purchaseid->totalprice = $request->totalpurchaseprice;
            $purchaseid->cprice = $request->cprice;
            $purchaseid->other = $request->other;
            $purchaseid->description = $request->description;
            $purchaseid->save();

            return redirect()->route('purchaselist');

        }


    }


    public function purchaseorder($id)
    {

        $findpurchase = Purchaseinfo::where('id', $id)->first();
        return view('backend.superadmin.purchase.updatepurchase', compact('findpurchase'));

    }


    public function printcustombarcode($id)
    {


        $findpurchase = Purchaseinfo::where('id', $id)->first();



        return view('backend.superadmin.print.custombarcodeprint', compact('findpurchase'));


    }


    public function workorderdelete($id)
    {

        $orderidfind = Workorder::where('id', $id)->first();
        if($orderidfind)
        {
            $orderidfind->delete();
            return redirect()->back()->with('success', 'workorder Delete Successfully');
        }
        else
        {
            return redirect()->back()->withErrors('sorry', 'Your Workorder Not Found');
        }

    }
    public function deletepurchase($id)
    {

        $purchaseidfind = Purchaseinfo::where('id', $id)->first();

        if($purchaseidfind)
        {

            $purchaseidfind->delete();

            return redirect()->back()->with('success', 'Purcahse Delete Success');
        }
        else
        {
            return redirect()->back()->withErrors('sorry purchase id not found');
        }


    }



    public function generateIdnew()
    {
        $latestId = DB::table('workorders')->latest('orderid')->first();
        if ($latestId) {
            preg_match('/\d+/', $latestId->orderid, $matches);
            $latestId = $matches[0];
        } else {
            $latestId = 0;
        }
        return str_pad($latestId + 1, 4, '0', STR_PAD_LEFT);
    }

    public function orderorderform()
    {
        $orderid = $this->generateId();

        $neworderid = $this->generateIdnew();

        return view('backend.superadmin.purchase.workorder', compact('orderid', 'neworderid'));

    }


    public function generateId()
    {
        $latestId = DB::table('workorders')->latest('orderid')->first();
        if ($latestId) {
            preg_match('/\d+/', $latestId->orderid, $matches);
            $latestId = $matches[0];
        } else {
            $latestId = 0;
        }
        return str_pad($latestId, 4, '0', STR_PAD_LEFT);
    }


    public function addorderwork(Request $request)
    {


        $validator = Validator::make($request->all(),[

            'orderid' => 'required',
            'productid' => 'required',
            'categoryid' => 'required',
            'subcactegoryid' => 'required',
            'suppliarid' => 'required',
            'unitcost' => 'required',
            'quentity' => 'required',
            'totalpurchaseprice' => 'required',
            'date' => 'required'


        ]);

       if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }




        $purchase = new Workorder;
        $purchase->orderid = $request->orderid;
        $purchase->productid = $request->productid;
        $purchase->categoryid = $request->categoryid;
        $purchase->subcactegoryid = $request->subcactegoryid;
        $purchase->suppliarid = $request->suppliarid;
        $purchase->unitcost = $request->unitcost;
        $purchase->quentity = $request->quentity;
        $purchase->totalprice = $request->totalpurchaseprice;
        $purchase->date = $request->date;
        $purchase->other = $request->other;
        $purchase->description = $request->description;
        $purchase->save();




        return redirect()->route('listworkorder');


    }

    public function  invoice($purchaseid)
    {
        $invoice = Posinfo::where('purchaseid', $purchaseid)->first();




        $pdf = \PDF::loadView('backend.superadmin.report.receiveinvoice', compact());
        return $pdf->download('invoice.pdf');

    }



    public function generateIdnews()
    {
//

            $latestId = DB::table('purchaseinfos')->latest('purchaseid')->first();
            if ($latestId) {
                preg_match('/\d+/', $latestId->purchaseid, $matches);
                $latestId = $matches[0];
            } else {
                $latestId = 0;
            }
            return str_pad($latestId + 1, 4, '0', STR_PAD_LEFT);

//        }


    }

    public function addpurchase(Request $request)
    {
//        dd($request->all());
        //$validator = Validator::make($request->all(),[
            //'purchaseid' => 'required',
           // 'productid' => 'required',
           // 'categoryid' => 'required',
           // 'subcategoryid' => 'required',
           // 'suppliarid' => 'required',
           // 'unitcost' => 'required',
           // 'unitSellsprice' => 'required',
           // 'quentity' => 'required',
           // 'vat' => 'required',
           // 'profitpercentage' => 'required',
           // 'totalpurchaseprice' => 'required',
           // 'cprice' => 'required'
       // ]);

       //if ($validator->fails()) {

            //return redirect()->back()->withErrors($validator)->withInput();
        //}


        $purchaseGroups = [
            'purchaseid' => $request->purchaseid,
            'productid' => $request->productid,
            'orderdate' => $request->orderdate,
            'delivarydate' => $request->delivarydate,
            'suppliarid' => $request->suppliarid,
            'vatid' => $request->vat,
            'unitcost' => $request->unitcost,
            'profite' => $request->profitpercentage,
            'totalprice' => $request->totalpurchaseprice,
            'unitsellsprice' => $request->unitSellsprice,
            'quentity' => $request->quentity,
            'totalprice' => $request->totalsellsprice,
            'cprice' => $request->cprice,
            'other' => $request->other,
            'description' => $request->description,
        ];
//        dd($purchaseGroups);
        $insert = Purchaseinfo::create($purchaseGroups);
        if($insert){
            $barcode = $insert->id.$insert->productid.$insert->suppliarid.$insert->customerprice;
            $barcode = substr($barcode, -10);
            Purchaseinfo::where('id', $insert->id)->update([
                'barcode' => $barcode
            ]);
        }

//        $purchae = $this->generateIdnews();
//
//
//        $productid = $request->input('productid');
//        $cprice = $request->input('cprice');
//        $suppliarid = $request->input('suppliarid');
//        $currentDateTime = Carbon::now();
//
//
//        // Fetch the last record and extract the last 3 digits from the ID
//        $lastRecord = Purchaseinfo::latest('barcode')->first();
//        $lastId = ($lastRecord) ? intval($lastRecord->barcode) : 0;
//        $start = ($lastId % 1000) + 1;
//
//        $counter = $start;
//        do{
//            $counter++;
//            $barcode = Carbon::now()->format('d-m-Y'). str_pad($productid, 2, '0', STR_PAD_LEFT) . str_pad($cprice, 2, '0', STR_PAD_LEFT) . str_pad($suppliarid, 2, '0', STR_PAD_LEFT) . str_pad($counter, 3, '0', STR_PAD_LEFT);
//
//            $barcode = substr($barcode, -10);
//            $existingRecord = Purchaseinfo::where('barcode', $barcode)->first();
//        } while ($existingRecord);
//
//
//
//        $purchase = new Purchaseinfo;
//        $purchase->barcode  = $barcode;
//        $purchase->orderid = $request->orderid;
//        $purchase->purchaseid = $request->purchaseid;
//        $purchase->orderdate = $request->date;
//        $purchase->productid = $request->productid;
//        $purchase->categoryid = $request->categoryid;
//        $purchase->subcategoryid = $request->subcategoryid;
//        $purchase->suppliarid = $request->suppliarid;
//        $purchase->unitcost = $request->unitcost;
//        $purchase->unitSellsprice = $request->unitSellsprice;
//        $purchase->quentity = $request->quentity;
//        $purchase->profite = $request->profitpercentage;
//        $purchase->vatid  =  $request->vat;
//        $purchase->totalprice = $request->totalpurchaseprice;
//        $purchase->cprice = $request->cprice;
//        $purchase->other = $request->other;
//        $purchase->description = $request->description;
//        $purchase->save();
//
//
//        $stockupdate = Stock::where('productid', $request->productid)->first();
//        $stockupdate->stock += $request->quentity;
//        $stockupdate->save();

        //firstly collect all showroomid then insert productid barcode vat price



        return redirect()->route('purchaseform', ['slot_purchase_id' => $request->purchaseid])->with('success', 'Purcahse added successfully');
    }
}
