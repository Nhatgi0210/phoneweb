<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Các cột có thể điền
    protected $fillable = [
        'user_id',
        'total_price',
        'status',
        'created_at',
        'updated_at',
    ];
    const PENDING = 0;
    const APPROVED = 1;
    const CANCELLED = 2;
    // Quan hệ với bảng order_items
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Quan hệ với bảng users
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
