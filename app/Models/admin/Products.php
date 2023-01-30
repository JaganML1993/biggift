<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'url_key',
        'sku',
        'category_id',
        'subcategory_id',
        'brand_id',
        'color_id',
        'price',
        'thumbnail',
        'browse_by',
        'short_description',
        'description',
        'specification',
        'status',
        'deleted',
        'related_products',
    ];
}
