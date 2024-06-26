<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorNameMethod extends Model
{
    use HasFactory;

    function name_method()
    {
        return    $this->belongsTo(ColorMethod::class,'color_method');
    }
}
