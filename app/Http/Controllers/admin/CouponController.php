<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\coupon;
use Carbon\Carbon;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data['coupons']=coupon::get();
        $date=Carbon::now()->format('Y-m-d');
        foreach($data['coupons'] as $coupon){
            if($coupon->expires_at==$date){
                $coupon->delete();
            }
        }
        return view('admin.coupon.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        // dd($r->all());
        $r->validate([
            'coupon_code'=>'required',
            'coupon_name'=>'required',
            'coupon_limit'=>'required',
            'discount_amount'=>'required',
            'expire'=>'required',
        ]);
         
        if($r->id==null){
            // dd('null');
            $coupon=new coupon();
            $coupon->coupon_code=strtoupper($r->coupon_code);
            $coupon->coupon_name=$r->coupon_name;
            $coupon->max_uses=$r->coupon_limit;
            $coupon->discount_amount=$r->discount_amount;
            $coupon->status=$r->status;
            
            $coupon->expires_at=strtotime($r->expire);
            $coupon->save();
        }   
        else{
                $coupon=coupon::find($r->id);                
                $coupon->expires_at=$r->expire;
                $coupon->coupon_code = strtoupper($r->coupon_code);
                $coupon->coupon_name = $r->coupon_name;
                $coupon->max_uses = $r->coupon_limit;
                $coupon->discount_amount = $r->discount_amount;
                $coupon->status = $r->status;
                $coupon->update();
        }
        return redirect('coupon');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $coupon=coupon::where('id',$id)->first()->toArray();
        $date=date('d/m/Y',strtotime($coupon['expires_at']));

        return response(array_merge($coupon,['date'=>$date]));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        coupon::find($id)->delete();
        return redirect('coupon');
    }
}
