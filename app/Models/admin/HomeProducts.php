<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeProducts extends Model
{
    use HasFactory;

    protected $table = 'products_home';

    protected $fillable = [
        'name',
        'url_key',
        'sku',
        'company_id',
        'brand_id',
        'color_id',
        'price',
        'thumbnail',
        'short_description',
        'description',
        'specification',
        'status',
        'deleted',
    ];
}
