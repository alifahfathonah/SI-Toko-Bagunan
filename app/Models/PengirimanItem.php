<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengirimanItem extends Model
{
    protected $table = 'pengiriman_item';
    protected $guarded = [];

    public function PenjualanItem()
    {
        return $this->belongsTo(PenjualanItem::class);
    }
}
