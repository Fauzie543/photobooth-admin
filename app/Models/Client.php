<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    // Nama tabel (opsional jika sesuai konvensi Laravel)
    protected $table = 'clients';

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'name',
        'email',
        'phone',
    ];

    public function orders() {
        return $this->hasMany(Order::class);
    }
}