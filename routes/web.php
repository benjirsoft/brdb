<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductCategoryVat\ProductCategoryvatController;
use App\Http\Controllers\ProductCategoryVat\ProductCategoryvatlosicalController;
use App\Http\Controllers\Purchasebarcode\PurchasebarcodeformController;
use App\Http\Controllers\Purchasebarcode\PurchasebarcodelosicalController;
use App\Http\Controllers\Sell\SellsFormController;
use App\Http\Controllers\Sell\SellslosicalController;
use App\Http\Controllers\ShowroomStock\ShowroomStockController;
use App\Http\Controllers\ShowroomStock\ShowroomStocklosicalController;
use App\Http\Controllers\SuppliarCustomer\SuppliarFormController;
use App\Http\Controllers\SuppliarCustomer\SuppliarCustomerLosicalController;
use App\Http\Controllers\SuperadminController;
use App\Models\Cart;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [App\Http\Controllers\HomeController::class, 'homepage'])->name('website');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//superadmin section
Route::middleware(['auth', 'user-role:superadmin'])->group(function(){

    Route::get('/superadmin', [App\Http\Controllers\SuperadminController::class, 'formpage'])->name('superadmins');


    Route::get('/suppliarpurchasetotal', [SuppliarCustomerLosicalController::class, 'suppliaribaserate'])->name('purchaseratesupplair');


    Route::get('suppliarrate', [SuppliarCustomerLosicalController::class, 'suppliarbaseproductrate'])->name('ratesuppliar');

    Route::get('/addproduct', [ProductCategoryvatController::class, 'addproductform'])->name('addproductform');

    Route::get('/productdelete/{id}', [ProductCategoryvatController::class, 'deleteproduct'])->name('product-delete');


    //add product section
    Route::post('/adproduct', [ProductCategoryvatController::class, 'adproduct'])->name('addproduct');

    Route::get('/productlist', [ProductCategoryvatlosicalController::class, 'productlist'])->name('productlists');


    Route::get('/updateproduct/{id}', [ProductCategoryvatController::class, 'updateproductform'])->name('updateproduct');


    Route::post('/productupdate', [ProductCategoryvatController::class, 'productupdate'])->name('productupdate');


    Route::get('/profit', [App\Http\Controllers\ReportController::class, 'profitreportpage'])->name('profitmargin');

    Route::get('/addcategory', [ProductCategoryvatController::class, 'addcategoryform'])->name('addcategoryform');

    Route::post('/addcategory', [ProductCategoryvatController::class, 'addcategory'])->name('addcategory');

    Route::get('/categorylist', [ProductCategoryvatlosicalController::class, 'categorylist'])->name('listcategory');

    Route::get('/update-category/{id}', [ProductCategoryvatController::class, 'categoryupdateform'])->name('category-update');

    Route::post('/categoryupdate', [ProductCategoryvatController::class, 'updatecategory'])->name('updatecategory');

    Route::get('/deletecategory/{id}', [ProductCategoryvatController::class, 'deletecategory'])->name('deletecategory');


    //end of category section

    Route::get('/findproduct/{findproduct}', [ProductCategoryvatController::class, 'findproduct'])->name('findproduct');

    Route::get('/findshowroom/{showroomid}', [ProductCategoryvatController::class, 'findshowroom'])->name('findshowroom');

    // purchase product section

    Route::get('/purchase', [PurchasebarcodeformController::class, 'purchaseform'])->name('purchaseform');

    Route::post('/addpurchase', [PurchasebarcodelosicalController::class, 'addpurchase'])->name('addpurchase');

     Route::get('/purchaselist', [ProductCategoryvatlosicalController::class, 'purchaselist'])->name('purchaselist');

    Route::get('/deletepurchase/{id}', [PurchasebarcodelosicalController::class, 'deletepurchase'])->name('purchasedelete');

    //update section

    Route::get('/update-purchase/{id}', [PurchasebarcodelosicalController::class, 'purchaseorder'])->name('purchaseupdate');

    Route::post('/purchaseupdate', [PurchasebarcodelosicalController::class, 'updatepurchase'])->name('updatepurchase');

    //end of purchase section


    // Workorder section

    Route::get('/workorder', [PurchasebarcodelosicalController::class, 'orderorderform'])->name('workorder');

    Route::post('/addorder', [PurchasebarcodelosicalController::class, 'addorderwork'])->name('addworkorder');

    Route::get('/deleteworkorder/{id}', [PurchasebarcodelosicalController::class, 'workorderdelete'])->name('deletelistworkorder');


    Route::get('/listworkorder', [ProductCategoryvatlosicalController::class, 'workorderlist'])->name('listworkorder');


    Route::get('/printworkorder/{orderid}', [ProductCategoryvatlosicalController::class, 'printinvoice'])->name('print-workorder');Route::get('/workorder', [PurchasebarcodelosicalController::class, 'orderorderform'])->name('workorder');


    Route::get('/deleteworkorder/{id}', [PurchasebarcodelosicalController::class, 'workorderdelete'])->name('deletelistworkorder');


    Route::get('/printworkorder/{orderid}', [ProductCategoryvatlosicalController::class, 'printinvoice'])->name('print-workorder');

    //update section

    Route::get('/updateworkorder/{id}', [ProductCategoryvatController::class, 'updateworkorderform'])->name('updateworkorder');


    Route::post('/workorderupdate', [ProductCategoryvatController::class, 'workorderupdayte'])->name('workorderupdate');



    //end of workorder


    //print section

    Route::get('/printlabel', [ProductCategoryvatlosicalController::class, 'printbarcode'])->name('print-label');


    Route::get('/printpurchaseinvoice/{purchaseid}', [ProductCategoryvatlosicalController::class, 'printpurchase'])->name('print-invoice');

    //endofprintsection



    //suppliar section
    Route::get('/suppliarlist', [SuppliarFormController::class, 'suppliarlist'])->name('suppliarlist');

    Route::get('/deletesuppliar/{id}', [SuppliarFormController::class, 'deletesuppliar'])->name('suppliardelete');

    Route::get('/adsuppliarform', [SuppliarCustomerLosicalController::class, 'addsuppliarform'])->name('adsuppliars');

    Route::post('/addsuppliar', [SuppliarCustomerLosicalController::class, 'addsuppliar'])->name('addsuppliar');


    Route::get('/findsuppliar/{suppliarid}', [ProductCategoryvatController::class, 'findSuppliar'])->name('findsuppliar');


    //update section

    Route::get('/updatesuppliar/{id}', [SuppliarFormController::class, 'updatesuppliar'])->name('updatesuppliarform');

    Route::post('/suppliarupdate', [SuppliarFormController::class, 'suppliarupdate'])->name('suppliarupdate');


   //end of suppliar section

    Route::get('/addshowroom', [ShowroomStocklosicalController::class, 'Showroomform'])->name('adshowroomform');

    Route::get('/deleteshowroom/{id}', [ShowroomStocklosicalController::class, 'deleteshowroom'])->name('showroomdelete');


    Route::post('/addshowrom', [ShowroomStocklosicalController::class, 'showroomadd'])->name('addshowroom');

    Route::get('/showroomlist', [ShowroomStocklosicalController::class, 'showroomlist'])->name('showroomlist');






    Route::post('/addsubcategory', [ProductCategoryvatlosicalController::class, 'storesubcategory'])->name('addsubcategory');

    Route::get('/subcategorydelete/{id}', [ProductCategoryvatController::class, 'deletesubcategory'])->name('deletesubcategory');

    Route::get('/addsubcategorylist', [ProductCategoryvatController::class, 'addsubcategory'])->name('addsubcategorylist');

    Route::get('/addsubcategoryform', [ProductCategoryvatController::class, 'addsubcategoryform'])->name('addsubcategoryform');


    Route::get('/purchaseorder/{id}', [PurchasebarcodeformController::class, 'purchasebar'])->name('purchaseorder');

    Route::get('/productstock', [ProductCategoryvatController::class, 'stockpage'])->name('stockproduct');


    Route::get('/vatform', [ProductCategoryvatController::class, 'vatstoreform'])->name('addvatform');

    Route::post('/vatstore', [ProductCategoryvatlosicalController::class, 'vatstore'])->name('addvatstore');


    Route::get('/vatlist', [ProductCategoryvatController::class, 'listvat'])->name('listvat');

    Route::get('/vat/{id}', [ProductCategoryvatController::class, 'vatdelete'])->name('deletevat');

    Route::get('/transferproduct', [SuperadminController::class, 'transferproductform'])->name('transferproductform');

    Route::post('/addtransfer', [SuperadminController::class, 'transferproduct'])->name('Transferproduct');

    Route::get('/customprint/{id}', [PurchasebarcodelosicalController::class, 'printcustombarcode'])->name('print-custom');


    Route::get('updatesubcategory/{id}', [ProductCategoryvatlosicalController::class, 'updatesubcategory'])->name('updatesubcategoryform');

    Route::post('updatesubcategory', [ProductCategoryvatController::class, 'updatesubcategory'])->name('upsubcategory');

});

//admin section
Route::middleware(['auth', 'user-role:admin'])->group(function(){


});


//account section
Route::middleware(['auth', 'user-role:accountadmin'])->group(function(){

});

//showroomincharge section
Route::middleware(['auth', 'user-role:showroomincharge'])->group(function(){

    Route::get('/showroomincharge', [App\Http\Controllers\ShowroomInchargeController::class, 'showroom'])->name('showroominchar');


    Route::get('/addsells', [SellsFormController::class, 'sellsform'])->name('sellsform');

    Route::get('/search-products', [SellslosicalController::class, 'search'])->name('addtocart');

    Route::get('/carproduct', [SellslosicalController::class, 'addtocart'])->name('cart');

    Route::get('/cart-popup', [SellslosicalController::class, 'preview'])->name('preview');


    Route::post('/sells', [SellslosicalController::class, 'sellsconfirm'])->name('sellsconfirm');

    Route::get('/deletecartitem/{id}', [SellslosicalController::class, 'deletecacrt'])->name('cartdelete');

    //list of sells

    Route::get('/sellslist', [SellsFormController::class, 'sellslist'])->name('listsells');

    Route::get('/sellsreport', [SellsFormController::class, 'reportform'])->name('reportform');

    Route::get('/sellsreport/{period}', [SellsFormController::class, 'sellsreport'])->name('sellsreport');

    Route::get('/searchdatetodate', [SellsFormController::class, 'searchdatetodate'])->name('datesells');



    //Search Api

    Route::post('search_product_by_barcode', [SellsFormController::class, 'search_product_by_barcode'])->name('search_product_by_barcode');

});


//maintain section
Route::middleware(['auth', 'user-role:maintainadmin'])->group(function(){


});

//commity section
Route::middleware(['auth', 'user-role:commity'])->group(function(){


});

//suppliar section
Route::middleware(['auth', 'user-role:suppliar'])->group(function(){


});

//systemadmin section
Route::middleware(['auth', 'user-role:superadmin'])->group(function(){





});


