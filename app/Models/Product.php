<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = null; 
    // <!--Tag  -->
    protected $fillable = [
        'name', 'original_price', 'discount_price', 'brand_id', 'category_id', 'main_image_path'
    ];
    public function Tag(){
        return $this->belongsToMany(Tag::class,'product_tag','product_id','tag_id')->withPivot('end_date');
    }
    public function scopeProductWithTag($query, $tag_name){
        return $query->whereHas('Tag',function($query) use($tag_name){
            $query->where('tags.name', $tag_name)
            ->where("product_tag.end_date",">",Carbon::now());
        });
    }

    //<!--Image-->
    public function Image(){
        return $this->hasMany(Image::class);
    }
    // <--Brand-->
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // <--Category-->
    public function category(){
        return $this->belongsTo(Category::class);
    }
   
    //config
    // public function phoneConfig()
    // {
    //     return $this->hasOne(PhoneConfig::class);
    // }

    // Trong Product.php
public function phoneConfig()
{
    return $this->hasOne(PhoneConfig::class, 'product_id');
}

}

