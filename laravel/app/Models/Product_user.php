<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_user extends Model
{
    use HasFactory;

    protected $fillable = [
        'number_of_products',
        'first_name',
        'last_name',
        'order_code',
        'transport_type',
        'payment_type',
        'user_id',
        'product_id',
        'address_id',
    ];

    protected $table = 'product_user';

    const CREATED_AT = 'create_date';
    const UPDATED_AT = null;
}
