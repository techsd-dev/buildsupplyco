<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'prd_name',
        'slug',
        'category_id',
        'sub_category_id',
        'brand_id',
        'prd_price',
        'qty',
        'prd_discount_price',
        'prd_description',
        'prd_image',
        'prd_images',
        'status'
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
