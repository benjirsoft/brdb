<?php

namespace App\Http\Controllers\ProductCategoryVat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Productinfo;
use App\Models\Suppliarinfo;
use App\Models\Purchaseinfo;
use App\Models\Workorder;
use App\Models\Vat;
use App\Models\Subcategory;
use Dompdf\Dompdf;
use Illuminate\Support\Carbon;
use Dompdf\Options;
use DNS1D;
use Illuminate\Support\Facades\Validator;

class ProductCategoryvatlosicalController extends Controller
{

    public function updatesubcategory($id)
    {

        $subcactegory = Subcategory::where('id', $id)->first();

        return view('backend.superadmin.category.updatesubcategory', compact('subcactegory'));


    }
    public function storesubcategory(Request $request)
    {

        $validator = Validator::make($request->all(),[

            'subcategory' => 'required|unique:subcategories,subcategoriesname',


        ]);

       if ($validator->fails()) {

            return redirect()->back()->withErrors($validator)->withInput();
        }

        $subcategory = new Subcategory;
        $subcategory->subcategoriesname = $request->subcategory;
        $subcategory->save();

        return redirect()->back()->with('success', 'Sub Category Store');

    }

    public function vatstore(Request $request)
    {

        $vatinfo = new Vat;
        $vatinfo->amount = $request->vat;
        $vatinfo->save();

        return redirect()->back()->with('success', 'Vat Store Success');

    }



    public function printinvoice($orderid)
    {

        $print = Workorder::where('orderid', $orderid)->get();

        $printinvoice = Workorder::where('orderid', $orderid)->first();

        $order = $printinvoice->orderid;

        $suppliar = $printinvoice->suppliarid;

        $time = $printinvoice->created_at;

        // Format the date and time as a string
        $formattedTime = $time->format('d-m-Y');


         $supp = Suppliarinfo::where('suppliarid', $suppliar)->first();

         $suppname = $supp->name;

         $company = $supp->companyname;

         $addrs = $supp->address;

         $mobile = $supp->mobile;

        $pdf = \PDF::loadView('backend.superadmin.purchase.invoice', compact('print', 'order', 'suppname', 'addrs', 'mobile', 'formattedTime', 'company'));
        return $pdf->download('invoice.pdf');

    }

    public function printpurchase($purchaseid)
    {

        $print = Purchaseinfo::where('purchaseid', $purchaseid)->get();
        $printinvoice = Purchaseinfo::where('purchaseid', $purchaseid)->first();
        $order = $printinvoice->orderid;
        $formattimeorderdate = $printinvoice->orderdate;
        $suppliar = $printinvoice->suppliarid;
        $time = $printinvoice->created_at;
        // Format the date and time as a string
        $formattedTime = $time->format('d-m-Y');
        $supp = Suppliarinfo::where('suppliarid', $suppliar)->first();
        $suppname = $supp->name;
        $company = $supp->companyname;
        $addrs = $supp->address;
        $mobile = $supp->mobile;
        $pdf = \PDF::loadView('backend.superadmin.purchase.receiveinvoice', compact('print', 'purchaseid', 'order', 'suppname', 'company', 'addrs', 'mobile', 'formattedTime', 'formattimeorderdate'));
        return $pdf->download('invoice.pdf');

    }

    public function printbarcode(Request $request)
    {

        $quantity = $request->input('quentity', 1);

    $html = '<style type="text/css">
        .label {
            // width: 1.8in;
            width: 31vw;
            height: 1in;
            border: 1px solid black;
            font-size: 12pt;
            font-family: Sans-serif;
            display: inline-block;
            text-align: center;
            margin: 1.9mm;
        }

        .test{
            margin-bottom: 1px;
        }

        .barcode {
            display: block;
            width: 100%;
            height: 50%;
            margin-top:5px;
        }
    </style><div style="text-align:center">';
    // Loop through the quantity and generate barcode labels
    for ($i = 1; $i <= $quantity; $i++) {
        $barcode = $request->input('barcode');
        $productname = $request->input('productname');
        $cprice = $request->input('cprice');

        // Generate the barcode SVG and convert it to PNG
        $barcode_svg = DNS1D::getBarcodeSVG($barcode, 'C128', 1.3, 40);
        $barcode_png = base64_encode($barcode_svg);
        $barcode_src = 'data:image/png;base64,' . $barcode_png;

        $labelHtml = '<div class="label">
            <div class="test">
                <div style="margin-top: 0px; font-size: 9pt; font-weight: bold; font-family:Fjalla; margin-bottom: 1px">
                    <span style="margin-left:-10px">Karupalli BRDB <br/></span>
                    '.substr($productname, 0, 10).'
                </div>
                <div>
                    <span style="font-size:10pt">Price: '.$cprice.' Tk</span>
                </div>
            </div>
            <div class="barcode">
                <img src="'.$barcode_src.'">
            </div>
            <span></span>
        </div>';

        $html .= $labelHtml;
    }
    $html .= '</div>';
    // Create a new Dompdf instance
    $pdf = new Dompdf();

    // Set the PDF content and options
    $pdf->loadHtml($html);
    // return $html;
    $pdf->setPaper('A4', 'potrait');

    $pdf->render();
    $pdf->stream();
    return $pdf;

    }

    public function productlist()
    {

        $product = Productinfo::orderBy('created_at', 'desc')->latest()->get();

        return view('backend.superadmin.product.index', compact('product'));
    }

    public function categorylist()
    {

        $category = ProductCategory::orderBy('created_at', 'desc')->latest()->get();
        return view('backend.superadmin.category.index', compact('category'));

    }

    public function purchaselist()
    {
        $purchase = Purchaseinfo::orderBy('created_at', 'desc')->latest()->get();
        return view('backend.superadmin.purchase.index', compact('purchase'));
    }

    public function workorderlist()
    {

        $workorderlist = Workorder::orderBy('created_at', 'desc')->latest()->get();
        return view('backend.superadmin.purchase.listworkorder', compact('workorderlist'));

    }


}
