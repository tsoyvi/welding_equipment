<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group_tech_devices_item extends Model
{
    use HasFactory;

    protected $hidden = [
        'id',  
        'gtd_id'
    ]; 
}
