<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'orderlist',   
        'buyer_name',   
        'buyer_tel',   
        'buyer_addr',   
        'buyer_email',   
        'amount',   
        'orderstate',   
        'user_id',   
        'uid',   
    ];
}
