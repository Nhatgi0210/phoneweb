<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class User2 extends Model
{
    protected $table = 'users';
    public $timestamps = false; 
    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id', 'id');
    }
    public function comments()
{
    return $this->hasMany(Comment::class);
}

}