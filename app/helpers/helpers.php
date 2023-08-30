<?php
use App\Models\cart;
use App\Models\categories;
use App\Models\order_items;
use Illuminate\Support\Facades\Auth;
use App\Models\like;
use Carbon\Carbon;
use App\Models\wishlists;
if(!function_exists('category')){
    function category(){
        $data['categorylist']=["All Categories"]+categories::get()->pluck('name','id')->toArray();
        return $data;
    }
}
if(!function_exists('cartitems')){
    function cartitems(){
        if(Auth::check()){
            $data["cartitems"] = cart::where('customer_id', Auth::user()->id)->join('products', 'cart.product_id', '=', 'products.id')
            ->select('products.urlslug as url',
                'products.name as product_name',
                'products.description as product_description',
                'products.image as image',
                'products.discount_price as discount',
                'products.price as product_price','cart.*')->get();
            $data["quantity"]=cart::where('customer_id',Auth::user()->id)->pluck('quantity','product_id');
        }else{
            $data["cartitems"] =[];
            $data['quantity']=[];
        }
        $data['categorylist']=["All Categories"]+categories::get()->pluck('name','id')->toArray();
        // dd($data);
        return $data;
    }
}
if(!function_exists('qutycount')){
    function qutycount(string $orderid){
        $count=order_items::where('order_id',$orderid)->sum('item_quantity');
        // $count=dd($count);
        return $count;
    }
}
if(!function_exists('rupee')){
    function rupee()
    {
        return   $rupee='&#8377;';
    }
}
if(!function_exists('orderscount')){
    function orderscount($orderid){
        $order=order_items::where('order_id',$orderid)->get();
        return count($order);
    }
}
if(!function_exists('couponlist')){
    function couponlist(){
        $list=array('Total Orders','Total Order Amount');
        return $list;
    }
}
if(!function_exists('totalLikes')){
    function totalLikes($reviewid){
        $likes=like::where('review_id',$reviewid)->count();
        return $likes;
    }
}

if(!function_exists('isLiked')){
    function isLiked($reviewid){
        $isliked=empty(like::where('customer_id',Auth::user()->id)->where('review_id',$reviewid)->first());
        // dd($isliked);
        return $isliked;
    }
}


if(!function_exists('isPresentInWish'))
{
    function isPresentInWish($productid){
        return empty(wishlists::where('customer_id',Auth::user()->id)->where('product_id',$productid)->first());
    }
}




if(!function_exists('isPresentInCart'))
{
    function isPresentInCart($productid){
        return empty(cart::where('customer_id',Auth::user()->id)->where('product_id',$productid)->first());
    }
}









if(!function_exists('livetime')){
    function liveTime($time){
        // dd();
      $diff = time() - strtotime($time);      
      if( $diff < 1 ) { 
        return 'less than 1 second ago'; 
    }

    $time_rules = array ( 
        12 * 30 * 24 * 60 * 60 => 'year',
        30 * 24 * 60 * 60       => 'month',
        24 * 60 * 60           => 'day',
        60 * 60                   => 'hour',
        60                       => 'minute',
        1                       => 'second'
    );

    foreach( $time_rules as $secs => $str ) {

        $div = $diff / $secs;

        if( $div >= 1 ) {

            $t = round( $div );

            return $t . ' ' . $str . 
            ( $t > 1 ? 's' : '' ) . ' ago';
        }
    }
}
}

