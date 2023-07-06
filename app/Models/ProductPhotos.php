<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductPhotos extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'photo',
        'default',
        'status'
    ];

    public function productSpecification(): HasMany
    {
        return $this->hasMany(ProductSpecifications::class);
    }
}
