<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\orders_status;
use App\Models\orders;
use App\Models\order_items;
use Auth;
use Excel;
use App\Exports\ExportOrders;

class orderscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {        
        $data['status']=orders_status::pluck('status_name','id');
        $data['orders']=orders::join(
            'users','orders.customer_id','=','users.id')->select(
                'users.name as username','orders.*')->get();
        return view('admin.orders.index',$data);
    }
    public function update(Request $r){
       $order=orders::where('id',$r->orderid)->first();
       $order->status=$r->status;
       $order->update();
       return response(['id'=>$r->orderid]);
    }
    public function exportorders(){
        // dd($data);
        
        $responce=Excel::download(new ExportOrders, 'Orders.xlsx');
        ob_end_clean();

        return $responce;
    }
    public function vieworder(string $id){
         $orders['maildata']=orders::where('orders.id',$id)->
        join('address','orders.billing_address','=','address.id')->
        select('address.name as adrname',
        'address.mobile_no as adrmobileno',
        'address.address_line1 as address','orders.*',
        'address.post_code as pincode')->first()->toArray();                
        // dd($orders['maildata']->toArray());
        $orders['items']=order_items::where('order_id',$id)->join('products','order_items.item_id','=','products.id')
        ->select('products.name as pname','products.discount_price as discount','order_items.*')->get()->toArray();       
        $orders['status']=orders_status::pluck('status_name','id');    
           // dd($id);
        return view('admin.orders.show-order',$orders);
    }
}