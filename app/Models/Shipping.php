<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $table = 'pengiriman';
    protected $fillable = [
        'penjualan_id', 'tanggal_pengiriman', 'status','prioritas'
    ];

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class);
    }
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function items()
    {
        return $this->hasMany(PengirimanItem::class,'pengiriman_id','id');
    }
}
