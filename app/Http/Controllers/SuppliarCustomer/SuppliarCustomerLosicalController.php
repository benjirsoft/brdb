<?php

namespace App\Http\Controllers\SuppliarCustomer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Suppliarinfo;
use App\Models\Purchaseinfo;
use App\Models\Productinfo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SuppliarCustomerLosicalController extends Controller
{


    public function suppliaribaserate()
    {

        $purchaseInfoBySupplier = Purchaseinfo::select('suppliarid', DB::raw('SUM(totalprice) as total_purchase_price'))
    ->groupBy('suppliarid')
    ->get();


            foreach ($purchaseInfoBySupplier as $supplierPurchaseInfo) {
            $supplierId = $supplierPurchaseInfo->suppliarid;
            $supplierName = Suppliarinfo::where('suppliarid', $supplierId)->first()->name; // fetch supplier name from the Supplier model
            $totalPurchasePrice = $supplierPurchaseInfo->total_purchase_price;

            $supplierPurchasePriceList[] = [
                'supplier_id' => $supplierId,
                'supplier_name' => $supplierName,
                'total_purchase_price' => $totalPurchasePrice,
            ];
        }


            return view('backend.superadmin.suppliar.suppliarbasepurchaselist', compact('supplierPurchasePriceList'));
    }

    public function suppliarbaseproductrate()
    {

        $supplierProductRateList = [];
        $purchaseInfos = Purchaseinfo::with('productname', 'suppliars')
            ->whereNotNull('suppliarid')
            ->get();

        foreach ($purchaseInfos as $purchaseInfo) {
            $supplierId = $purchaseInfo->suppliarid;
            $supplierName = $purchaseInfo->suppliars->name;
            $productId = $purchaseInfo->productid;
            $productName = $purchaseInfo->productname->productname;
            $productRate = $purchaseInfo->unitcost;
            $customerprice = $purchaseInfo->cprice;

            $key = $supplierId . '_' . $productId;
            if (!isset($supplierProductRateList[$key])) {
                $supplierProductRateList[$key] = [
                    'supplier_id' => $supplierId,
                    'supplier_name' => $supplierName,
                    'product_id' => $productId,
                    'product_name' => $productName,
                    'product_rate' => $productRate,
                    'customer_price' => $customerprice,
                ];
            }
        }

        $supplierProductRateList = array_values($supplierProductRateList);


        return view('backend.superadmin.suppliar.suppliarbaseproductrate', compact('supplierProductRateList'));



    }

    public function generateId()
    {
        $latestId = DB::table('suppliar_infos')->latest('suppliarid')->first();
        if ($latestId) {
            preg_match('/\d+/', $latestId->suppliarid, $matches);
            $latestId = $matches[0];
        } else {
            $latestId = 0;
        }
        return str_pad($latestId + 1, 4, '0', STR_PAD_LEFT);
    }
    

    public function addsuppliarform()
    {

        $suppliarid = $this->generateId();

        return view('backend.superadmin.suppliar.addsuppliar', compact('suppliarid'));

    }


    public function addsuppliar(Request $request)
    {

        $validator = Validator::make($request->all(),[

            'companyname' => 'required|unique:suppliar_infos,companyname',
            'name' => 'required|unique:suppliar_infos,name',

            
        ]);

       if ($validator->fails()) {
        
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $suppliar = new Suppliarinfo;

        $suppliar->suppliarid = $request->suppliarid;
        $suppliar->companyname = $request->companyname;
        $suppliar->name = $request->name;
        $suppliar->address = $request->address;
        $suppliar->mobile = $request->mobileno;
        $suppliar->save();


        return redirect()->back()->with('success', 'Suppliar added successfully');
        

    }
}
