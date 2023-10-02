<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ntd_list;
use Illuminate\Http\Request;

class NTDListController extends Controller
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
            $ntdList = Ntd_list::all();
            $success = true;
            $message = 'ntd_list';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
            $ntdList = '';
        }

        return response()->json([
            "success" => $success,
            "message" => $message,
            "ntd_list" => $ntdList,
        ]);
    }
}
