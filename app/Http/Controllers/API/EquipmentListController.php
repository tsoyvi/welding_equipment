<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Equipment_list;
use App\Http\Requests\EquipmentList\CreateRequest;
use Illuminate\Http\Request;

class EquipmentListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        try {

            foreach ($request->data as $key => $value) {
                $arr = [];
                $arr['order_id'] = $request->order_id;
                /*foreach ($value as $key_data => $value_data) {
                    if ($key_data !== 'so') {
                        $arr[$key_data] = $value_data;
                    } else {
                        $arr[$key_data] = json_encode($value_data);
                    }
                }*/
                $created = Equipment_list::create($arr);
            }

            // $data = $request->validated();
            // $created = Equipment_list::create($data);

            $success = true;
            $message = 'Добавлена запись';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        return response()->json([
            "success" => $success,
            "message" => $message,
            "equipment_list" => $arr,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
