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
        'product_title',
        'product_price',
        'product_description',
        'product_status',
        'product_category',
        'product_quantity',
        'product_review',
        'product_rating'

    ];
}
