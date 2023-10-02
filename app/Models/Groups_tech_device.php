<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groups_tech_device extends Model
{
    use HasFactory;

    public function list()
    {
        return $this->hasMany(Group_tech_devices_item::class, 'gtd_id', 'id');
    }
}
