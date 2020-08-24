<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;


class Payment extends Model
{
    use AutoNumberTrait;

    protected $table = 'payments';

    protected $fillable = [
        'payment_date', 'purchase_id', 'sale_id', 'reference_no', 'amount','sales_name','sales_phone'
    ];

    /**
     * Return the autonumber configuration array for this model.
     *
     * @return array
     */
    public function getAutoNumberOptions()
    {
        return [
            'reference_no' => [
                'format' => 'BY/' . date('Y') . '-' . date('m') . '/?', // Format kode yang akan digunakan.
                'length' => 5 // Jumlah digit yang akan digunakan sebagai nomor urut
            ]
        ];
    }
}
