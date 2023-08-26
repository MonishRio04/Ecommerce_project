<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comments;
use Auth;
use Carbon\Carbon;
class CommentController extends Controller
{
   public function addcmnt(Request $r){
    $comments=new Comments;
    $comments->product_slug=$r->productslug;
    $comments->customer_id=Auth::user()->id;
    $comments->comments=$r->comment;
    $comments->save();
    $response['name']=Auth::user()->name;
    $response['comments']=$r->comment;
    $response['created_at']=Carbon::now()->format('Y-m-d H:i:s');
    // dd($response);
    return response($response);
   }
}
