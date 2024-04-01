<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesStyle extends Model
{
    use HasFactory;
    protected $guarded = [];
    function style(){
        return $this->belongsTo(ColorNameMethod::class);
    }
    function sale_order(){
        return $this->belongsTo(ColorNameMethod::class);
    }

}
