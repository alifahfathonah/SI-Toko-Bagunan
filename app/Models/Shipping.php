<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Shipping extends Model
{
    protected $table = 'pengiriman';
    protected $fillable = [
        'tanggal_pengiriman', 'nama_pembeli', 'alamat_pembeli', 'phone', 'grandtotal', 'status', 'prioritas','send_at'
    ];

    protected $appends = [
        'time_send'
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
        return $this->hasMany(PengirimanItem::class, 'pengiriman_id', 'id');
    }

    public function detailItems()
    {
        $items = $this->items;
        $product = [];
        foreach ($items as $item) {
            $product[] = $item->product->nama_produk;
        }
        return implode(', ', $product);
    }

    public function getTimeSendAttribute(){
        return Carbon::parse($this->attributes['send_at'])->format('H:i');
    }
}
