<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorMethodSalesStyle extends Model
{
    use HasFactory;
    protected $guarded = [];
    function color_method()
    {
        return $this->belongsTo(ColorMethod::class);
    }
    function sales_style()
    {
        return $this->belongsTo(ColorNameSalesStyle::class);
    }
}
