<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category2 extends Model
{
    use HasFactory;

    protected $fillable = [
        'category1_id',
        'category2_name'  
    ];
}
