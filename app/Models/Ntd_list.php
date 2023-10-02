<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ntd_list extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'long_name',
        'control_method',
        'weld_enabled',
        'otu',
        'welding_method',
        'details_type',
        'materials_group',
        'deleted'
    ];



    public static function getList()
    {
        return Ntd_list::select(
            [
                'id',
                'name',
                'long_name as longName',
                'control_method',
                'weld_enabled as weldEnabled',
                'otu',
                'welding_method as weldingMethod',
                'details_type as detailsType',
                'materials_group as materialsGroup',
                'deleted'
            ]
        )->orderBy('name')->get();
    }

    public static function saveNewNTD($newNTD)
    {
        $convertArr = [
            'name' => $newNTD['name'],
            'long_name' => $newNTD['longName'],
            'control_method' => json_encode($newNTD['control_method']),
            'weld_enabled' => $newNTD['weldEnabled'],
            'otu' => $newNTD['otu'],
            'welding_method' => $newNTD['weldingMethod'],
            'details_type' => $newNTD['detailsType'],
            'materials_group' => $newNTD['materialsGroup'],
            'deleted' => $newNTD['deleted'],
        ];

        return Ntd_list::create($convertArr);
    }

    public static function editNTD($newNTD)
    {
        $convertArr = [
            'name' => $newNTD['name'],
            'long_name' => $newNTD['longName'],
            'control_method' => json_encode($newNTD['control_method']),
            'weld_enabled' => $newNTD['weldEnabled'],
            'otu' => $newNTD['otu'],
            'welding_method' => $newNTD['weldingMethod'],
            'details_type' => $newNTD['detailsType'],
            'materials_group' => $newNTD['materialsGroup'],
            'deleted' => $newNTD['deleted'],
        ];
        return Ntd_list::create($convertArr);
    }
}
