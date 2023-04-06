<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'postalcode_id',
        'state_id',
    ];

    protected $table = 'address';
    const CREATED_AT = 'create_date';
    const UPDATED_AT = null;
}
