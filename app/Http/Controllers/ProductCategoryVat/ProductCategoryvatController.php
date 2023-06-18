<?php

namespace App\Http\Controllers\ProductCategoryVat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Productinfo;
use App\Models\Suppliarinfo;
use App\Models\Purchaseinfo;
use App\Models\Stock;
use App\Models\Vat;
use App\Models\Subcategory;
use App\Models\ShowroomInfo;
use App\Models\StockInfo;
use App\Models\Workorder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductCategoryvatController extends Controller
{

    public function workorderupdayte(Request $request)
    {


        $id = $request->input('id');

        $workorder = Workorder::where('id', $id)->first();



        if($workorder)
        {

            $workorder->orderid = $request->orderid;
            $workorder->productid = $request->productid;
            $workorder->categoryid = $request->categoryid;
            $workorder->subcactegoryid = $request->subcactegoryid;
            $workorder->suppliarid = $request->suppliarid;
            $workorder->unitcost = $request->unitcost;
            $workorder->quentity = $request->quentity;
            $workorder->totalprice = $request->totalpurchaseprice;
            $workorder->date = $request->date;
            $workorder->other = $request->other;
            $workorder->description = $request->description;
            $workorder->save();

            return redirect()->route('listworkorder');

        }
        else
        {
            return redirect()->back()->withErrors('sorry, orderid not found ');
        }


    }



    public function updateworkorderform($id)
    {

        $findworkorder = Workorder::where('id', $id)->first();

        return view('backend.superadmin.purchase.updateworkorder', compact('findworkorder'));

    }



    public function productupdate(Request $request)
    {

        $id = $request->input('id');

        $product = Productinfo::where('id', $id)->first();

        if($product)
        {

            $product->productid = $request->productid;
            $product->productname = $request->productname;
            $product->categoryid = $request->category_id;
            $product->subcategoryid = $request->subcategory_id;
            $product->producttypes = $request->productype;
            $product->other = $request->other;
            $product->description = $request->description;
            $product->save();

            return redirect()->route('productlists');
        }
        else
        {

            return redirect()->back()->withErrors('sorry Product Not Found');
        }

    }


    public function updateproductform($id)
    {

        $findproduct = Productinfo::where('id', $id)->first();
        return view('backend.superadmin.product.updateproduct', compact('findproduct'));

    }


    public function updatesubcategory(Request $request)
    {

        $id = $request->input('id');

        $subcategoryname = $request->input('subcategory');


        $updatesubcategory = Subcategory::where('id', $id)->first();

        if($updatesubcategory)
        {

            $updatesubcategory->subcategoriesname = $subcategoryname;
            $updatesubcategory->save();

            return redirect()->route('addsubcategorylist');

        }
        else
        {

            return redirect()->back()->withErrors('sorry subcategory not found');
        }

    }



    public function updatecategory(Request $request)
    {

        $categoryname = $request->input('categoryname');

        $id = $request->input('id');

        $updatecategory = ProductCategory::where('id', $id)->first();

        if($updatecategory)
        {
            $updatecategory->name = $categoryname;
            $updatecategory->save();

            return redirect()->route('listcategory');
        }
        else
        {
            return redirect()->back()->withErrors('sorry Category Not Updated');
        }

    }


    public function categoryupdateform(Request $request, $id)
    {

        $findid = ProductCategory::where('id', $id)->first();

        return view('backend.superadmin.category.updatecategory', compact('findid'));
    }


    public function findshowroom($showroomid)
    {

        $showroom = ShowroomInfo::where('showroomid', $showroomid)->first();
        return response()->json($showroom);
    }

    public function deletesubcategory($id)
    {

        $findsubcategory = Subcategory::where('id', $id)->first();
        if($findsubcategory)
        {

            $findsubcategory->delete();

            return redirect()->back()->with('success', 'subcategory Delete Successfully');
        }

    }

    public function addsubcategoryform()
    {

        return view('backend.superadmin.category.subcategory');
    }

    public function addsubcategory()
    {

        $subcactegory = Subcategory::orderBy('created_at', 'desc')->latest()->get();

        return view('backend.superadmin.category.subcategoryindex', compact('subcactegory'));
    }

    public function listvat()
    {

        return view('backend.superadmin.vat.index');


    }



    public function vatstoreform()
    {


        return view('backend.superadmin.vat.addvat');


    }

    public function vatdelete($id)
    {

        $findid = Vat::where('id', $id)->first();

        if($findid)
        {

            $findid->delete();


            return redirect()->back()->with('success', 'Delete Your Vat Item');

        }
        else
        {

            return redirect()->back()->withErrors('sorry', 'vat id not found');

        }

    }
    public function findSuppliar($suppliarid)
    {
        $suppliar = Suppliarinfo::where('suppliarid', $suppliarid)->first();

        return response()->json($suppliar);
    }


    

    public function stockpage()
    {

        return view('backend.superadmin.stock.stock');

    }


    public function generateId()
    {
        $latestId = DB::table('productinfos')->latest('productid')->first();
        if ($latestId) {
            preg_match('/\d+/', $latestId->productid, $matches);
            $latestId = $matches[0];
        } else {
            $latestId = 0;
        }
        return str_pad($latestId + 1, 4, '0', STR_PAD_LEFT);
    }

    public function addproductform()
    {

        $Productid = $this->generateId();

        return view('backend.superadmin.product.adproduct', compact('Productid'));
    }


    public function adproduct(Request $request)
    {
        $validator = Validator::make($request->all(),[

            'productname' => 'required|unique:productinfos,productname',

            
        ]);

       if ($validator->fails()) {
        
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $product = new Productinfo;
        $product->productid = $request->productid;
        $product->categoryid = $request->category_id;
        $product->subcategoryid = $request->subcategory_id;
        $product->producttypes = $request->productype;
        $product->productname = $request->productname;
        $product->other = $request->other;
        $product->description = $request->description;
        $product->save();


        $stock = 0;

        $stocks = new Stock;
        $stocks->productid = $request->productid;
        $stocks->stock = $stock;
        $stocks->save();

        $weightstock = 0;
        $showroomid = 'S001';
        $showroomstock = new StockInfo;
        $showroomstock->showroomid = $showroomid;
        $showroomstock->productid = $request->productid;
        $showroomstock->quentitypc = $stock;
        $showroomstock->weightquentity = $weightstock;
        $showroomstock->save();

        return redirect()->route('productlists');
    }

    public function addcategoryform()
    {

        return view('backend.superadmin.category.addcategory');

    }

    public function addcategory(Request $request)
    {

        $validator = Validator::make($request->all(),[

            'categoryname' => 'required|unique:product_categories,name',

            
        ]);

       if ($validator->fails()) {
        
            return redirect()->back()->withErrors($validator)->withInput();
        }


       $category = new ProductCategory;
       $category->name = $request->categoryname;
       $category->save();

       return redirect()->route('listcategory');

    }


    public function deleteproduct($id)
    {

        $findproduct = Productinfo::where('id', $id)->first();

        if($findproduct)
        {

            $findproduct->delete();

            return redirect()->back()->with('success', 'Product Delete Success');

        }
        else
        {

            return redirect()->back()->withErrors('sorry', 'Your ProductID Not Found');

        }



    }

    public function deletecategory($id)
    {

        $findcategory = ProductCategory::where('id', $id)->first();

        if ($findcategory)
        {

            $findcategory->delete();

            return redirect()->back()->with('success', 'Category Delete Success');
        }
        else
        {

            return redirect()->back()->withErrors('sorry', 'category not found');

        }


    }



}
