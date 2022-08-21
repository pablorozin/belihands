<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected static function boot() {
        parent::boot();
    
        static::creating(function ($model) {
            $model->slug = Product::max('id') . '-' . str($model->name)->slug;
        });
    }

    protected $guarded = [];

    public function type()
    {
        return $this->belongsTo(ProductType::class, 'product_type_id');
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    } 
    
    public function scopeActive($query)
    {
        $query->where('is_active', 1);
    }

    protected function url(): Attribute
    {
        return Attribute::make(
            get: fn () => route('web.product', ['slug' => $this->slug]),
        );
    }
}
