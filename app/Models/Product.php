<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'product_name',
        'product_details',
        'product_price',
        'product_image',
        'product_qty',
        'category_name',
        'brand_id'
    ];

    public function category()
    {
        return $this->hasOne(Category::class, 'category_id', 'category_name')->withTrashed();
    }
    public function brand()
    {
        return $this->hasOne(Brand::class, 'brand_id', 'brand_id');
    }
}
