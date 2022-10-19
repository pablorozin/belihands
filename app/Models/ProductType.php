<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;

    protected static function boot() {
        parent::boot();
    
        static::creating(function ($model) {
            $model->slug = ProductType::max('id') . '-' . str($model->name)->slug;
        });
    
        static::updating(function ($model) {
            $model->slug = $model->id . '-' . str($model->name)->slug;
        });
    }

    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
