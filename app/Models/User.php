<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // 🟢 Tambahkan ini
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // relasi: satu user bisa punya banyak artikel
    public function artikels()
    {
        return $this->hasMany(Artikel::class, 'penulis_id');
    }
}
