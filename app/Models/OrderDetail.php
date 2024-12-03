<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details'; // Đảm bảo tên bảng đúng
    protected $fillable = ['order_id', 'product_id', 'quantity', 'price']; // Các cột bạn muốn mass-assign
}
