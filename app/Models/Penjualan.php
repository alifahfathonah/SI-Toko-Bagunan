<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualan';
    
    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(PenjualanItem::class);
    }
}
