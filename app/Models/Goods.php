<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    use HasFactory;

    protected $fillable = [
        'goods_title',  
        'goods_description',  
        'goods_price',  
        'ca_id',  
        'ca_id2',  
        'size',  
        'mainphoto',  
        'contentphoto',  
        'goods_color',  
    ];

    public function getComment(){
        return $this->hasMany(Comment::class)->orderBy('created_at','DESC');
    }
}
