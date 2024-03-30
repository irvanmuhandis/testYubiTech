<?php

namespace App\Http\Controllers;

use App\Models\ColorNameMethod;
use Illuminate\Http\Request;

class ColorNameMethodController extends Controller
{
    function index()
    {
        $data =  ColorNameMethod::all();
        $data->transform(function ($item) {
            $item['qty'] = 0;
            return $item;
        });
        return $data;
    }
}
