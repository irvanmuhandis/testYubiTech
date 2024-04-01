<?php

namespace App\Http\Controllers;

use App\Models\ColorMethodSalesStyle;
use App\Models\ColorNameSalesStyle;
use App\Models\SalesOrder;
use App\Models\SalesStyle;
use Illuminate\Http\Request;

class SalesOrderController extends Controller
{
    function index()
    {
        return SalesOrder::withSum('sale_style','qty')->get();
    }

    function store()
    {
        $form = request('form');
        $style = request('style');
        $log = [];
        // First add sonum,customer,date
        $order = SalesOrder::create([
            'customer' => $form['customer'],
            'sonummber' => $form['so_num'],
            'date' => $form['date']
        ]);
        array_push($log, $order);

        // Second add sales style --> connect with sales order & style
        foreach ($style as $item) {
            $response = SalesStyle::create([
                'qty' => $item['total'],
                'salesorder' => $order['id'],
                'style' => $item['id']
            ]);
            array_push($log, $response);
            // Third add colormethod_sales_style --> connect sales style & color method
            $log_child = [];
            array_push($log, ['msg' => "==mthd=="]);

            foreach ($item['selectedMethod'] as $method) {
                $method_response = ColorMethodSalesStyle::create([
                    'sales_style' => $response['id'],
                    'color_method' => $method['id']
                ]);
                array_push($log_child, $method_response);

                // Fourth add color name sales style --> connect color name mehod & color method sales
                $log_grandchild = [];
                array_push($log_child, ['msg' => "==clr=="]);
                foreach ($method['selectedColor'] as $color) {
                    $color_response = ColorNameSalesStyle::create([
                        'qty' => $color['qty'],
                        'color_name' => $color['id'],
                        'colormethod_sales' => $method_response['id']
                    ]);
                    array_push($log_grandchild, $color_response);
                }
                array_push($log_child, $log_grandchild);
            }
            array_push($log, $log_child);
        }
        return $log;
    }
}
