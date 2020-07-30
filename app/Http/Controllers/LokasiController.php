<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Models\Kabupaten;

class LokasiController extends Controller
{
    public function getProvinsi($id_prov = null)
    {
        if (is_null($id_prov)) {
            return Provinsi::all();
        } else {
            return Provinsi::where('id_prov', $id_prov)->first();
        }
    }

    public function getKabupatenByIdProv($id_prov)
    {
        return Kabupaten::where('id_prov', $id_prov)->get();
    }

    public function getKabupatenByIdKab($id_kab)
    {
        return Kabupaten::where('id_kab', $id_kab)->first();
    }
}
