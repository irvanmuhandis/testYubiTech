<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorNameSalesStyle extends Model
{
    use HasFactory;
    protected $guarded = [];
    function name_method()
    {
        return    $this->belongsTo(ColorNameMethod::class,'color_name');
    }
}
