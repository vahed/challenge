<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use League\Csv\Writer;
use League\Csv\Statement;

class ImportController extends Controller
{

    public function importFile(Request $request){
        $checkboxValueArr = $request->get('products');

        $csv = Writer::createFromFileObject(new \SplTempFileObject());
        //get header columns
        $header = $checkboxValueArr;
        //insert as column header
        $csv->insertOne($header);
        //get the records macth column headers
        $orders = Order::select($header)->get();

        foreach ($orders as $key=>$order) {
            $csv->insertOne($order->toArray());
        }
        //download the requested csv records
        $csv->output('orders.csv');
    }
}
