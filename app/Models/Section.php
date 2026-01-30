<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;


class Section extends Model
{
    use HasFactory;

    protected $fillable = [

        'admin_id',
        'urlfolder',

        'name',
        'description',
        'status',
        'position',
        

    ];

}
