<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vessel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'vessel_type',
        'flag',
        'imo_number',
        'grt',
        'dwt',
        'image',
        'last_port',
        'operation_type',
        'status',
        'details',
    ];
}
