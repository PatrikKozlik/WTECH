<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Street extends Model
{
    use HasFactory;

    protected $fillable = [
        'street_number_id',
        'value',
    ];

    protected $table = 'street';

    const CREATED_AT = null;
    const UPDATED_AT = null;
}
