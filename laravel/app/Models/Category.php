<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'state_id',
    ];

    protected $table = 'category';
    const CREATED_AT = 'create_date';
    const UPDATED_AT = null;
}
