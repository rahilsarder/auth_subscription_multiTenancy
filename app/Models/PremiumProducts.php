<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PremiumProducts extends Model
{
    use HasFactory;


    protected $fillable = [
        'name', 'price', 'slug',
    ];

    public function product()
    {
        return $this->hasMany(Products::class, 'id', 'premium_product_id');
    }
}
