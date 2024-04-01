<?php

namespace App\Http\Controllers;

use App\Models\ColorNameMethod;
use Illuminate\Http\Request;

class ColorNameMethodController extends Controller
{
    function index()
    {
        $req = request('method_id');
        $data =  ColorNameMethod::where('color_method',$req)->get();
        $data->transform(function ($item) {
            $item['qty'] = 0;
            return $item;
        });
        return $data;
    }
}
