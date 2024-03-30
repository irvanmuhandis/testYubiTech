<?php

namespace App\Http\Controllers;

use App\Models\ColorNameSalesStyle;
use Illuminate\Http\Request;

class ColorNameSalesStyleController extends Controller
{
    function index()
    {
        return ColorNameSalesStyle::with('name_method')->get();
    }
}
