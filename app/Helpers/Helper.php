<?php

use Illuminate\Support\Facades\Route;

function set_active($uri, $output = 'active')
{
    if (is_array($uri)) {
        foreach ($uri as $u) {
            if (Route::is($u)) {
                return $output;
            }
        }
    } else {
        if (Route::is($uri)) {
            return $output;
        }
    }
}

function set_show($uri, $output = 'show')
{
    if (is_array($uri)) {
        foreach ($uri as $u) {
            if (Route::is($u)) {
                return $output;
            }
        }
    } 
}

function badge($status){
    if(strtolower($status) == 'lunas' || strtolower($status) == 'selesai'){
        return '<span class="badge badge-success">'.strtoupper($status).'</span>';
    }
    else if(strtolower($status) == 'proses' || strtolower($status) == 'sebagian'){
        return '<span class="badge badge-warning">'.strtoupper($status).'</span>';
    }
    else if(strtolower($status) == 'belum'){
        return '<span class="badge badge-danger">'.strtoupper($status).'</span>';
    }

}

function currency($number)
{
    return str_replace(',', '.', number_format($number));
}

