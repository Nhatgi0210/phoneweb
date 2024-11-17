<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainImage extends Model
{
    use HasFactory;

    public $timestamps = false;
    public function Product(){
        return $this->hasOne(Product::class);
    }
    Public function Image(){
        return $this->hasOne(Image::class);
    }
}
