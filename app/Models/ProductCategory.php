<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCategory extends Model
{
    use HasFactory;

    protected static function boot() {
        parent::boot();
    
        static::creating(function ($model) {
            $model->slug = ProductCategory::max('id') . '-' . str($model->name)->slug;
        });
    }

    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
