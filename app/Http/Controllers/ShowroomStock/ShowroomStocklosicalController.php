<?php

namespace App\Http\Controllers\ShowroomStock;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShowroomInfo;
use App\Models\StockInfo;
use App\Models\Sellsinfo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class ShowroomStocklosicalController extends Controller
{


    public function deleteshowroom($id)
    {

        $findshowroom = ShowroomInfo::where('id', $id)->first();

        if($findshowroom)
        {

            $findshowroom->delete();

            return redirect()->back()->with('success', 'Showroom Delete Success');

        }
        else
        {

            return redirect()->back()->withErrors('sorry', 'Id Not Found');

        }


    }


    public function showroomlist()
    {

        $list = ShowroomInfo::orderBy('created_at', 'desc')->latest()->get();

        return view('backend.superadmin.Showroom.index', compact('list'));


    }


    public function generateId()
    {
        $latestId = DB::table('showroom_infos')->latest('showroomid')->first();
        if ($latestId) {
            preg_match('/\d+/', $latestId->showroomid, $matches);
            $latestId = $matches[0];
        } else {
            $latestId = 0;
        }
        return str_pad($latestId + 1, 5, '0', STR_PAD_LEFT);
    }


    public function Showroomform()
    {

        $showroomid = $this->generateId();

        return view('backend.superadmin.Showroom.addshowroom', compact('showroomid'));


    }


    public function showroomadd(Request $request)
    {

        $validator = Validator::make($request->all(),[

            'showroomname' => 'required|unique:showroom_infos,showroomname',
            
        ]);

       if ($validator->fails()) {
        
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $showroom = new ShowroomInfo;

        $showroom->showroomid = $request->showroomid;
        $showroom->showroomname = $request->showroomname;
        $showroom->address = $request->address;
        $showroom->mobile = $request->mobile;
        $showroom->save();


        $showroomid = new Sellsinfo;

        $showroomid->showroomid = $request->showroomid;
        $showroomid->save();

        return redirect()->back()->with('success', 'New Showroom Added Successfully');

    }
}
