<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\order_items;
use App\Models\orders;
use App\Models\orders_status;
use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Auth;
use PDF;
class   orderitems extends Controller
{
   public function orderitems(){
    $data=new indexController;
    $data=$data->data();
    $data['orders']=orders::where('customer_id',Auth::user()->id)->latest()->get();
    $data['orderstatus']=orders_status::pluck('status_name','id');
    return view('Front.order-info.orders',$data);
   }


   public function showorder(string $id){
        $order=orders::where('orders.customer_id',Auth::user()->id)
        ->where('orders.id',$id)
        ->join('address','orders.billing_address','=','address.id')
        ->leftJoin('coupons','orders.coupon_id','=','coupons.id')
        ->select('address.name as adrname',
        'address.mobile_no as adrmobileno',
        'address.address_line1 as address','orders.*',
        'address.post_code as pincode',
        'coupons.coupon_name as couponname',
        'coupons.coupon_code as couponcode',
        'coupons.discount_amount as couponamount'
     )->get()->toArray();        
        // dd($order);
        $order=$order[0];
        $orderitems=order_items::where('order_id',$id)->join('products','order_items.item_id','=','products.id')
        ->select('products.name as pname','products.discount_price as discount',
         'products.price as prprice'
         ,'order_items.*')->get();
        // dd($orderitems->all());
        return view('Front.order-info.showorder',['order'=>$order,'orderitems'=>$orderitems]);

   }
   public function getInvoice(int $id){
      $order['order']=orders::where('orders.customer_id',Auth::user()->id)
        ->where('orders.id',$id)
        ->join('address','orders.billing_address','=','address.id')
        ->leftJoin('coupons','orders.coupon_id','=','coupons.id')
        ->select('address.name as adrname',
        'address.mobile_no as adrmobileno',
        'address.address_line1 as address','orders.*',
        'address.post_code as pincode',
        'coupons.coupon_name as couponname',
        'coupons.coupon_code as couponcode',
        'coupons.discount_amount as couponamount'
         )->get()->toArray()[0];
         $order['orderitems']=order_items::where('order_id',$id)->join('products','order_items.item_id','=','products.id')
        ->select('products.name as pname','products.discount_price as discount','products.price as prprice','order_items.*')->get();
        $pdf=PDF::loadView('templates.userorderdetail',$order);
        return $pdf->download($id.'.pdf');
   }  
}
