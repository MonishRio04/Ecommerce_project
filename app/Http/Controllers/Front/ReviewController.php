<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reviews;
use Auth;
use Carbon\Carbon;
class ReviewController extends Controller
{
   public function addcmnt(Request $r){
      // dd($r->all());
    $reviews=new Reviews;
    $reviews->product_slug=$r->productslug;
    $reviews->customer_id=Auth::user()->id;
    $reviews->comments=$r->review;
    $reviews->save();
    $response['name']=Auth::user()->name;
    $response['reviews']=$r->review;
    $response['created_at']=Carbon::now()->format('Y-m-d H:i:s');
    // dd($response);
    return response($response);
   }
   public function addlike(boolean ){

   }
}
