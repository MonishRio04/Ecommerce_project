<?php
use App\Models\cart;
use App\Models\categories;
use App\Models\order_items;
use Illuminate\Support\Facades\Auth;


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
    if(!function_exists('qutycount')){
        function qutycount(string $orderid){
            $count=order_items::where('order_id',$orderid)->get();
            $count=count($count);
            return $count;
        }
    }
                if(!function_exists('rupee')){
                        function rupee()
                {
                    return   $rupee='&#8377;';
                }
            }
}
