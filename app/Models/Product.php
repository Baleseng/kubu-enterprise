<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [

        'admin_id',
        
        'file_path',
        'file_keywords',
        'file_description',

        'product_name',
        'product_price',
        'product_description',
        'product_status',
        'product_category',
        'product_type',
        'product_brand',
        'product_instock',
        'product_quantity',
        
    ];
}
