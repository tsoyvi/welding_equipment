<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable  = [
        'id',
        'applicant',
        'name_organization',
        'address',
        'inn',
        'name_contact',
        'phone',
        'email',
        'website',
        'organization_status',
    ];
}
