<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductSpecifications extends Model
{
    use HasFactory;

    protected $fillable =[
        'quantity',
        'size',
        'product_id'
    ];


    protected $casts = [
        'id' => 'int',
        'status' => 'int',
        'product_id' => 'int',
        'created_at' => 'datetime:d/m/Y h:m',
        'updated_at' => 'datetime:d/m/Y h:m',
        'deleted_at' => 'datetime:d/m/Y h:m',
        'quantity' => 'int'
    ];

}

