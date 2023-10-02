<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Groups_tech_device;
use Illuminate\Http\Request;

class OtuListController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        try {
            $otuList = Groups_tech_device::with('list')
                //->orderBy('ntd_inspectors.name')
                ->get();
            $success = true;
            $message = 'otu_list';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
            $otuList = '';
        }

        return response()->json([
            "success" => $success,
            "message" => $message,
            "otu_list" => $otuList,
        ]);
    }
}
