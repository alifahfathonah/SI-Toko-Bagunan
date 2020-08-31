<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePurchase extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   
        return [
            'tglPembelian'  => 'required|date',
            'supp'          => 'required',
            'grandTotal'    => 'required|numeric',
            'paymentStatus' => 'required|string',
            'jmlBayar'      => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'tglPembelian.required' => 'Tanggal Pembelian Tidak Boleh Kosong',
            'tglPembelian.date'     => 'Format Tanggal Pembelian Salah',
            
            'supp.required'         => 'Supplier tidak boleh kosong',
            'grandTotal.required'   => 'GrandTotal tidak boleh nol',
            'grandTotal.numeric'    => 'GrandTotal harus dalam bentuk angka',

            'paymentStatus.required'   => 'Status pembayaran tidak boleh kosong',
            'paymentStatus.string' => 'Format Status pembayaran salah',
            
            'jmlBayar.required'    => 'Jumlah yang dibayarkan tidak boleh kosong',
            'jmlBayar.numeric'     => 'Jumlah yang dibayarkan harus dalam bentuk angka',

        ];
    }
}
