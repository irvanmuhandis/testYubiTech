<?php

namespace App\Http\Controllers;

use App\Models\Style;
use Illuminate\Http\Request;

class StyleController extends Controller
{
    function index()
    {
        $datas =  Style::all();
        $datas->transform(function ($item) {
            $item['total'] = 0;
            $item['selectedMethod'] = [];
            return $item;
        });

        // Return the modified color methods
        return $datas;
    }
}
