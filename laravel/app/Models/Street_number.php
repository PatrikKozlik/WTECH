<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Street_number extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_id',
        'value',
    ];

    protected $table = 'street_number';

    const CREATED_AT = null;
    const UPDATED_AT = null;
}
