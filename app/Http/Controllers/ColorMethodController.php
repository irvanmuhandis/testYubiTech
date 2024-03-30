<?php

namespace App\Http\Controllers;

use App\Models\ColorMethod;
use Illuminate\Http\Request;

class ColorMethodController extends Controller
{
    function index()
    {
        $colorMethods =  ColorMethod::all();
        $colorMethods->transform(function ($item) {
            $item['subQty'] = 0;
            $item['selectedColor'] = [];
            $item['isOpenColor'] = false;
            return $item;
        });
        return $colorMethods;
    }
}
