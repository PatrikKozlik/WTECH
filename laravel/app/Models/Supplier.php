<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'state_id',
    ];

    protected $table = 'supplier';
    const CREATED_AT = 'create_date';
    const UPDATED_AT = null;
}
