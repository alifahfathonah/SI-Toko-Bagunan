<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class SalaryDriver extends Model
{
    protected $fillable = ['driver_id','amount'];
    protected $appends  = ['salary_date'];
    
    public function getSalaryDateAttribute(){
        return Carbon::parse($this->attributes['created_at'])->format('d-m-Y');
    }
}
