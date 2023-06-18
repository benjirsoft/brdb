<?php

namespace App\Http\Controllers\Purchasebarcode;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Workorder;

class PurchasebarcodeformController extends Controller
{

    public function purchasebar(Request $request, $id)
    {

        $purchasid = $this->generateId();
        $newpurchaseid = $this->generateIdnew();
        $findworkorder = Workorder::where('id', $id)->first();
        return view('backend.superadmin.purchase.addworkorderpurchase', compact('findworkorder', 'purchasid', 'newpurchaseid'));
    }
    public function generateId()
    {
        $latestId = DB::table('purchaseinfos')->latest('purchaseid')->first();
        if ($latestId) {
            preg_match('/\d+/', $latestId->purchaseid, $matches);
            $latestId = $matches[0];
        } else {
            $latestId = 0;
        }
        return str_pad($latestId, 4, '0', STR_PAD_LEFT);
    }

    public function purchaseform()
    {
        $purchasid = $this->generateId();

        $newpurchaseid = $this->generateIdnew();
        return view('backend.superadmin.purchase.addpurchase', compact('purchasid', 'newpurchaseid'));
    }

    public function generateIdnew()
    {
        
        $latestId = DB::table('purchaseinfos')->latest('purchaseid')->first();
        if ($latestId) {
            preg_match('/\d+/', $latestId->purchaseid, $matches);
            $latestId = $matches[0];
        } else {
            $latestId = 0;
        }
        return str_pad($latestId + 1, 4, '0', STR_PAD_LEFT);
    } 
}
