<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment_list extends Model
{
    use HasFactory;

    protected $fillable  = [
        'id',
        'order_id',
        'code_so',
        'welding_method',
        'otu',
        'type_att',
        'manufacturer',
        'model',
        'responsible',
        'cert',
        'so',
    ];
}
