<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function Tag(){
        return $this->belongsToMany(Tag::class,'product_tag','product_id','tag_id')->withPivot('end_date');
    }
    public function scopeProductWithTag($query, $tag_name){
        return $query->whereHas('Tag',function($query) use($tag_name){
            $query->where('tags.name', $tag_name)
            ->where("product_tag.end_date",">",Carbon::now());
        });
    }
}
