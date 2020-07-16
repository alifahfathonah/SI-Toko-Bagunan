<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $guarded = [
        'created_at','updated_at','deleted_at','id'
    ];
}
