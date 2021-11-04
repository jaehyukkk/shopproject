<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category1 extends Model
{
    use HasFactory;

    protected $fillable = [
        'category1_name',  
    ];

    public function getCategory2(){
        return $this->hasMany(Category2::class);
    }
}
