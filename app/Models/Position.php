<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->hasMany(User::class);
    }
    

    protected $table = 'positions'; // Tên bảng `positions`

    // Mối quan hệ ngược với `User`
    public function users2()
    {
        return $this->hasMany(User::class, 'position_id', 'id');
    }

}
