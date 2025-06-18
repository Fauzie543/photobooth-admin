<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'client_id',
        'frame_id',
        'photo',
        'printed',
        'status',
        'order_id_midtrans',
        'snap_token',
        'total_price',
    ];

    protected $casts = [
        'printed' => 'boolean',
    ];

    /**
     * Relasi ke Client (banyak order dimiliki satu client)
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * Relasi ke Frame (setiap order pakai satu frame)
     */
    public function frame()
    {
        return $this->belongsTo(Frame::class);
    }
}