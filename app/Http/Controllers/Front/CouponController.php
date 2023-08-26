<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\coupon;
use App\MOdels\orders;
use Auth;
class CouponController extends Controller
{
   public function viewcoupon(){
     $coupons=coupon::where('status',1)->get();
     $colors = ["#FF5733","#FFC300","#33FF57","#336BFF","#FF33E9","#A633FF","#FF9A33","#33FFE6","#FF3333","#FFD133"];
     return view('Front.coupon.index',['coupons'=>$coupons,'colors'=>$colors]);
  }

   public function isFirst(string $couponcode){
      $id=coupon::where('coupon_code',$couponcode)->first()->id;
      if($id!=null){ 
         $isfirst=orders::where('customer_id',Auth::user()->id)->where('coupon_id',$id)->first(); 
         if(empty($isfirst)){
            $coupon=coupon::where('coupon_code',$couponcode)->first()->toArray();
            return $coupon;
         }else{
           return ['coupon'=>$coupon='used'];
        }
      } else{
      return $coupon=null;
      }
   }
   // public function 
}
