<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\order_items;
use App\Models\orders;
use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Auth;

class   orderitems extends Controller
{
   public function orderitems(){
    $data=new indexController;
    $data=$data->data();
    $data['orders']=orders::where('customer_id',Auth::user()->id)->latest()->get();
    return view('Front.order-info.orders',$data);
   }


   public function showorder(string $id){
        $order=orders::where('orders.customer_id',Auth::user()->id)
        ->where('orders.id',$id)->
        join('address','orders.billing_address','=','address.id')->
        select('address.name as adrname',
        'address.mobile_no as adrmobileno',
        'address.address_line1 as address','orders.*',
        'address.post_code as pincode')->get()->toArray();
        $order=$order[0];
        $orderitems=order_items::where('order_id',$id)->join('products','order_items.item_id','=','products.id')
        ->select('products.name as pname','products.discount_price as discount','order_items.*')->get();
        // dd($orderitems);
        return view('Front.order-info.showorder',['order'=>$order,'orderitems'=>$orderitems]);

   }
}
