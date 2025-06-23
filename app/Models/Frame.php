<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frame extends Model
{
    use HasFactory;

    protected $table = 'frames';

    protected $fillable = [
        'name',
        'image',
        'active',
        'price',
        'total_slot',
    ];

    protected $casts = [
        'active' => 'boolean',
        'price' => 'decimal:2',
    ];

    public function orders() {
        return $this->hasMany(Order::class);
    }
}