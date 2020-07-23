<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Purchase extends Model
{
    use AutoNumberTrait;
    protected $guarded = [
        'created_at','updated_at','deleted_at','id'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function sales(){
        return $this->belongsTo(Sales::class);
    }

    /**
     * Return the autonumber configuration array for this model.
     *
     * @return array
     */
    public function getAutoNumberOptions()
    {
        return [
            'reference_no' => [
                'format' => 'BL/'.date('Y').'-'.date('m').'/?', // Format kode yang akan digunakan.
                'length' => 5 // Jumlah digit yang akan digunakan sebagai nomor urut
            ]
        ];
    }
}
