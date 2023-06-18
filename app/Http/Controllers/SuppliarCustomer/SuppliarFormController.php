<?php

namespace App\Http\Controllers\SuppliarCustomer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Suppliarinfo;

class SuppliarFormController extends Controller
{

	public function suppliarupdate(Request $request)
	{

		$id = $request->input('id');

		$suppliar = Suppliarinfo::where('id', $id)->first();

		if($suppliar)
		{

			$suppliar->suppliarid = $request->suppliarid;
	        $suppliar->companyname = $request->companyname;
	        $suppliar->name = $request->name;
	        $suppliar->address = $request->address;
	        $suppliar->mobile = $request->mobileno;
            $suppliar->save();


            return redirect()->route('suppliarlist');
		}
		else
		{

			return redirect()->back()->withErrors('sorry, suppliar not found ');

		}


	}

	public function updatesuppliar($id)
	{

		$findsuppliar = Suppliarinfo::where('id', $id)->first();

		return view('backend.superadmin.suppliar.updatesuppliar', compact('findsuppliar'));


	}


	public function deletesuppliar($id)
	{

		$suppliar = Suppliarinfo::where('id',$id)->first();

		if($suppliar)
		{

			$suppliar->delete();
			return redirect()->back()->with('success', 'suppliar Delete Success');
		}
		else
		{
			return redirect()->back()->withErrors('sorry', 'Your suppliar Id Not Found');

		}


	}



	public function suppliarlist()
	{


	    $suppliarlist = Suppliarinfo::orderBy('created_at', 'desc')->latest()->get();

		return view('backend.superadmin.suppliar.index', compact('suppliarlist'));

	}


}
