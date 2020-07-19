<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $fillable = [
        'supplier_id','name','phone'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
