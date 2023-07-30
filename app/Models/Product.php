<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected  $primaryKey = 'id';

    protected $fillable = [
        'name',
        'price',
        'status',
        'link',
        'description',
        'category_id'
    ];

    public function productPhoto(): HasMany
    {
        return $this->hasMany(ProductPhotos::class);
    }

    public function productVariation(): HasMany
    {
        return $this->hasMany(ProductSpecifications::class);
    }

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}