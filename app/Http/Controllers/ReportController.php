<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ReportController extends Controller
{

    public function profitreportpage()
    {

        $report = DB::table('profitaftersale')->orderBy('id', 'desc')->whereNotNull('created_at')->get();

        return view('backend.superadmin.report.index', compact('report'));

    }



}
