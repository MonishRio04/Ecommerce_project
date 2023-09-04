<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\orders;
use Carbon\Carbon as time;
use DB;
use App\Models\Products;
class reportController extends Controller
{
    protected function data($dtn){
         $orders['orders']=DB::table('orders')
                ->join('users', 'orders.customer_id', '=', 'users.id')
                ->select('users.name as uname',DB::raw('SUM(orders.total) as total'), DB::raw('COUNT(*) as total_orders','orders.id as id'))
                ->where('orders.created_at', '>=', $dtn)
                ->groupBy('users.name')                
                ->get();
        return $orders;
    }
    public function viewReport(){
        $last1y=time::today()->subDays(30);                
        return view('admin.report.index',$this->data($last1y));
    }
    public function getReport(Request $r){
        $days=[7,30,30*6,30*12];
        $last1y=time::today()->subDays($days[(int)$r->duration]);
        return response(['data'=>$this->data($last1y)]);
    }




     public function productReport(){

        $products['products']=DB::table('products')->join('order_items','products.id','=','order_items.item_id')
        ->select('products.name as pname',DB::raw('SUM(order_items.item_quantity) as quantity'))
            ->groupBy('products.name')->get();
        return view('admin.report.productreport',$products);
    }

}
