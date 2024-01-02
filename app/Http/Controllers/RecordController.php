<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Http\Requests\Record\CreateRequest;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            "success" => "success"
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
        try {
            $data = $request->validated();
            $created = Record::create($data);
            
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
    public function update(Request $request, Record $receipt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Record $receipt)
    {
        //
    }
}
