<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'user_id',
    ];


    // public function products()
    // {
    //     return $this->belongsTo(PremiumProducts::class, 'id', 'premium_product_id');
    // }
}
