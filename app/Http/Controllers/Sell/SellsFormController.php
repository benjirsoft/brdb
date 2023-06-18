<?php

namespace App\Http\Controllers\Sell;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posinfo;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SellsFormController extends Controller
{

    public function searchdatetodate()
    {


        $listsells = Posinfo::orderBy('created_at', 'desc')->latest()->get();
        return view('backend.showroomincharge.Sells.datetodatereport', compact('listsells'));

    }

    //public function searchdatetodate(Request $request)
    //{

        //$startdate = $request->input('datestart');
        //$enddate = $request->input('dateend');


//order = Posinfo::whereBetween('created_at', [$startdate, $enddate])->get();

        

//

    public function reportform()
    {
        return view('backend.showroomincharge.Sells.sellsreport');

    }


public function sellsreport($period){
    switch ($period) {
        case 'today':
            $startOfDay = Carbon::now()->startOfDay();
            $endOfDay = Carbon::now()->endOfDay();

            $sales = DB::table('posinfos')
                ->select(DB::raw('sum(totalamount) as total_sales'))
                ->whereBetween('created_at', [$startOfDay, $endOfDay])
                ->first();

            $totalSalesToday = number_format($sales->total_sales, 2);
            return view('backend.showroomincharge.Sells.sellsreport', compact('totalSalesToday'));
            break;

        case 'week':
            $sales = DB::table('posinfos')
                ->select(DB::raw('SUM(totalamount) as total_sales'))
                ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
                ->first();
            $totalSalesWeek = number_format($sales->total_sales, 2);
            return view('backend.showroomincharge.Sells.sellsreport', compact('totalSalesWeek'));
            break;
        case 'month':
            $sales = DB::table('posinfos')
                ->select(DB::raw('SUM(totalamount) as total_sales'))
                ->whereMonth('created_at', now()->month)
                ->first();
            $totalSalesMonth = number_format($sales->total_sales, 2);
            return view('backend.showroomincharge.Sells.sellsreport', compact('totalSalesMonth'));
            break;
        default:
            $sales = null;
            break;
    }
}





    public function sellslist()
    {

        $listsells = Posinfo::orderBy('created_at', 'desc')->latest()->get();

        return view('backend.showroomincharge.Sells.sellslist', compact('listsells'));
    }
    
    public function sellsform()
    {
        return view('backend.showroomincharge.Sells.ssells');
    }

}
