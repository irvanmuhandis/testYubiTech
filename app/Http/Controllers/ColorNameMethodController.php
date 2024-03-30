<?php

namespace App\Http\Controllers;

use App\Models\ColorNameMethod;
use Illuminate\Http\Request;

class ColorNameMethodController extends Controller
{
    function index()
    {
        return ColorNameMethod::all();
    }
}
