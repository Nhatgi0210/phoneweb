<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneConfig extends Model
{
    public $timestamps = false;
    use HasFactory;
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
   // PhoneConfig.php
protected $fillable = ['product_id', 'man_hinh', 'Chip', 'RAM', 'ROM', 'Pin','camera_truoc','camera_sau'];

    
}
