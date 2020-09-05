<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengirimanItem extends Model
{
    protected $table = 'pengiriman_item';
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
