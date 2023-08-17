<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\orders_status;
use App\Models\orders;
use Auth;

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
}