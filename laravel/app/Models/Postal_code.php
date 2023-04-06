<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postal_code extends Model
{
    use HasFactory;

    protected $fillable = [
        'street_id',
        'value',
    ];

    protected $table = 'postal_code';

    const CREATED_AT = null;
    const UPDATED_AT = null;
}
