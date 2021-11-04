<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'reply_content',
        'reply_photo', 
        'reply_writer',
        'goods_id',
        'star', 
        'reply_userid', 
    ];

    
}
