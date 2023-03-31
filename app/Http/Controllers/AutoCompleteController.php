<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\admin\DomainLocation;
use App\Models\admin\MasterData;
use App\Models\Location;
use Illuminate\Http\Request;

class AutoCompleteController extends Controller
{
    public function index()
    {
        //
    }

    public function autocomplete(Request $request)
    {
        if ($request->id == 'location') {
            $res = Location::select("name")
                ->where("name", "LIKE", "%{$request->term}%")
                ->get();

            return response()->json($res);
        }
        // else {
        //     $dynamic_master_id = str_replace('dynamic_master_', '', $request->id);

        //     $res = MasterData::select("value as name")
        //         ->where("value", "LIKE", "%{$request->term}%")
        //         ->where("dynamic_master_id", "=", "{$dynamic_master_id}")
        //         ->get();
        // }

        // return response()->json($res);
    }
}
