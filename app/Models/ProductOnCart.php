<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOnCart extends Model
{
    public $timestamps = null; 
    protected $table = 'product_on_carts';
    use HasFactory;
}
