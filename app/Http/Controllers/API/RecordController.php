<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Record;
use App\Http\Requests\Record\CreateRequest;
use App\Http\Requests\Record\UpdateRequest;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $recordsList = Record::all();
            $success = true;
            $message = 'recordList';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
            $recordsList = '';
        }

        return response()->json([
            "success" => $success,
            "message" => $message,
            "records_list" => $recordsList,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        $created = '';
        try {
            $data = $request->validated();
            $created = Record::create($data);
            // $created = Record::firstOrCreate($data);

            $success = true;
            $message = 'Добавлена запись';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        return response()->json([
            "success" => $success,
            "message" => $message,
            "record" => $created,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Record $receipt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Record $receipt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest  $request, Record $receipt)
    {
        $result = null;
        try {
            $data = $request->validated();

            $result = $receipt::where('id', $data['id'])->update($data);

            $success = true;
            $message = 'Запись обновлена';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        return response()->json([
            "success" => $success,
            "message" => $message,
            "data" => $result
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Record $receipt)
    {
        //
    }
}
