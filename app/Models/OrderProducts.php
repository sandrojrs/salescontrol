<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderProducts extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime:d/m/Y h:m',
        'updated_at' => 'datetime:d/m/Y h:m',
        'deleted_at' => 'datetime:d/m/Y h:m',
    ];

    protected $fillable = [
        'order_id',
        'product_specifications_id',
        'quantity',
        'created_at',
        'updated_at'
    ];

    public function order(): HasOne
    {
        return $this->hasOne(Order::class, 'id', 'order_id');
    }

    public function variation(): HasOne
    {
        return $this->hasOne(ProductSpecifications::class, 'id', 'product_specifications_id');
    }
}
