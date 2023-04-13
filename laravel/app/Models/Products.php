<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Supplier;

class Products extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'product_name',
        'price',
        'number_of_products',
        'available',
        'details',
        'category_id',
        'supplier_id'
    ];

    protected $table = 'products';
    const CREATED_AT = 'create_date';
    const UPDATED_AT = null;

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
