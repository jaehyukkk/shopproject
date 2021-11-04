<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cart_title', 
        'cart_price',
        'cart_photo',
        'color',
        'number', 
        'goods_id' 
    ];
}
