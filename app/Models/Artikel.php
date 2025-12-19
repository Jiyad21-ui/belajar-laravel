<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'konten',
        'penulis_id',
        'role'
    ];

    // relasi: artikel dimiliki oleh satu user
    public function penulis()
    {
        return $this->belongsTo(User::class, 'penulis_id');
    }
}   