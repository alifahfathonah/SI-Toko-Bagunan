<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $table = 'pengiriman';
    protected $fillable = [
        'penjualan_id', 'driver_id', 'tanggal_pengiriman', 'status'
    ];

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class);
    }
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
