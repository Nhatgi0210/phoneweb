<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneConfig extends Model
{
    use HasFactory;
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    protected $fillable = [
        'product_id',
        'chip',
        'ram',
        'rom',
        'pin',
        'man_hinh',
    ];
}
