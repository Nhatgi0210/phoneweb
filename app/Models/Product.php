<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function Tag(){
        return $this->belongsToMany(Tag::class,'product_tag','product_id','tag_id')->withPivot('end_date');
    }
}
