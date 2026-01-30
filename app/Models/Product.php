<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'urlfolder',
        
        'file_path',
        'specialsection',
        'firstcategory',
        'secondcategory',
        'thirdcategory',

        'brand',
        'name',
        'price',
        'description',
        'status',
        
        'stock',
        'quantity',

        'file_keywords',
        'file_description',
        'file_status',   
    ];
}
