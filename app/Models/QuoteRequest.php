<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'contact_person',
        'email',
        'phone',
        'vessel_name',
        'vessel_type',
        'grt',
        'port_or_strait',
        'eta_date',
        'requested_services',
        'notes',
        'status',
    ];

    protected $casts = [
        'requested_services' => 'array',
    ];
}
