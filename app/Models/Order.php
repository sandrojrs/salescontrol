<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'size',
        'state',
        'user_id',
        'tracking_code'
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function orders()
    {
        return $this->hasMany(OrderProducts::class, 'order_id', 'id');
    }
}
