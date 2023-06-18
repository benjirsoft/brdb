<?php

namespace App\Http\Controllers;
use App\Http\Controllers\SuperadminController;
use Illuminate\Http\Request;
use App\Models\Posinfo;

class ShowroomInchargeController extends Controller
{
    
    public function showroom()
    {

        $totalsell = Posinfo::all()->sum('totalamount');

        return view('backend.showroomincharge.dashboard.index', compact('totalsell'));
    }

}
