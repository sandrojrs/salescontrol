<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductPhotos extends Model
{
    use HasFactory;

    protected $casts = [
        'id' => 'int',
        'status' => 'int',
        'product_id' => 'int',
        'created_at' => 'datetime:d/m/Y h:m',
        'updated_at' => 'datetime:d/m/Y h:m',
        'deleted_at' => 'datetime:d/m/Y h:m',
        'description' => 'string'
    ];

    protected $fillable = [
        'description',
        'photo',
        'default',
        'status',
        'product_id',
    ];

    protected $appends = ['photoUrl'];

    public function getPhotoUrlAttribute()
    {
        return $this->attributes['photo'] != null ? 'storage/fotos' . $this->photo : null;
    }

    public function productSpecification(): HasMany
    {
        return $this->hasMany(ProductSpecifications::class);
    }
}
