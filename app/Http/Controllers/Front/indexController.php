<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\cart;
use App\Models\categories;
use App\Models\orders;
use App\Models\order_items;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Models\orders_status;
use App\Models\user_role;
use App\Models\User;
use App\Models\coupon;
use App\Models\Reviews;
use App\Http\Controllers\Front\CouponController;
use Session;
class indexController extends Controller
{

    public function data(){
        $data=[];
            $data['category']=categories::get();
            $data['newItems']=Products::get()->sortByDesc('id')->take(5);//get();
            $data['products']=Products::get()->take(10);
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
            return $data;
}

    public function index()
    {
        return view('index',$this->data() );
    }

    public function show(string $slug){
        $data["product"]=Products::where('urlslug',$slug)->get()->first();
        $data['categorylist']=categories::pluck('name','id');
        $data['reviews']=Reviews::where('product_slug',$slug)
        ->join('users','reviews.customer_id','=','users.id')->select('name','reviews.*')->latest()->get();        
        return view('Front.showproduct.showproduct',$this->data(),$data);
    }

    public function addToCart(Request $r){
        $carts=new cart;
        // dd($r->all());
        $r->validate(['quantity'=> 'required|integer|not_in:0|max:10']);     
        $sameproduct=cart::where('product_id',$r->product_id)->where('customer_id',Auth::user()->id)->first();
        if($sameproduct){
            // dd('in');
            if($sameproduct->customer_id==$r->customer_id&&$sameproduct->product_id==$r->product_id){
                $quantity=(int)$sameproduct->quantity;
                $quantity+=(int)$r->quantity;
                $sameproduct->quantity=(int)$quantity;
                $sameproduct->update();
            }
        }
        else{
            // dd('else');
            $carts->customer_id=(int)$r->customer_id;
            $carts->product_id=(int)$r->product_id;
            $carts->quantity=(int)$r->quantity;
            $carts->save();
        }
        $cart = Cart::where('customer_id', Auth::user()->id)->join('products', 'cart.product_id', '=', 'products.id')
        ->select('products.name as product_name', 'products.price as product_price','cart.*')->get();
        // dd($cart);
        return response($cart);//->with('added','Added to cart');
    }

    public function delete(int $id){
        // dd($id);
        cart::find($id)->delete();
        // dd($id);
        return ['id'=>$id];
    }
     public function cartPage(){

        return view('Front.cart.cartItems',$this->data());

   }

   // 

   public function buyNow(Request $r){
    // dd($r->all());
            if(cart::where('product_id',$r->product_id)->first()==null){
                $carts=new cart;
                $carts->customer_id=(int)$r->customer_id;
                $carts->product_id=(int)$r->product_id;
                $carts->quantity=(int)$r->quantity;
                $carts->save();
                return redirect('checkout/buynow');
            }else{
                return redirect('checkout/buynow');
            }
    }


// 

   public function checkout(string $process){
    $address=Address::where('customer_id',Auth::user()->id)->get();
    $addre=null;
        if(count($address)==0){
            return redirect('/customer-address');
        }
        else{           
           foreach($address as $addr){
                $addre[$addr->id]=$addr->name." ".$addr->mobile_no." ".$addr->address_line1." ".$addr->post_code;
            }
            if($process=='buynow'){
            $data["cartitems"][0] =cart::where('customer_id', Auth::user()->id)->join('products', 'cart.product_id', '=', 'products.id')
                ->select(
                'products.name as product_name',
                'products.discount_price as discount',
                'products.price as product_price','cart.*')->latest()->first();
            }else{
                $data=$this->data();
            }
            // dd($data);
                return view('Front.cart.checkout',$data,['addre'=>$addre,'process'=>$process]);
        }
    }

    public function placeorder(Request $r){
       $r->validate([
            'address'=>'required'
       ]);  
       // dd($r);
       if(cart::where('customer_id',Auth::user()->id)->count()!=0):      
           if($r->couponid!=null){
                $coupon_update=coupon::where('id',$r->couponid)->first();        
                $coupon_update->uses=$coupon_update->uses!=null?$coupon_update->uses+1:1;
                $coupon_update->update();
            }   

           $cartitems=cart::where('customer_id',Auth::user()->id)->join('products','cart.product_id','=','products.id')
            ->select('products.price as product_price','cart.*')->get();
            // dd($cartitems->all());
            if($r->process=='buynow'){
                $cartitems[0]=cart::where('customer_id',Auth::user()->id)->join('products','cart.product_id','=','products.id')
                ->select('products.price as product_price','cart.*')->latest()->first();
            }
            // dd($cartitems);
            foreach($cartitems as $cart){
                $updatestock=products::where('id',$cart->product_id)->first();
                $updatestock->stock_quantity-=$cart->quantity;
                $updatestock->update();
            }
            $orders=new orders;
            $orders->customer_id=Auth::user()->id;
            if($r->coupontotal!=null){
                $orders->total=$r->coupontotal;
                $orders->coupon_id=$r->couponid;
            }else{
                $orders->total=$r->total;
            }
            $orders->billing_address=(int)$r->address;
            $orders->payment_type=$r->paymentMethod;
            $orders->save();
            $ordercode='ORD'.date('Y').'0000'.$orders->id;
        //    dd($ordercode);
            orders::where('id',$orders->id)->update(['order_code'=>$ordercode]);
            $orderid=$orders->id;
            foreach($cartitems as $cart){
                $ordered_items=new order_items;
                $ordered_items->order_id=$orders->id;
                $ordered_items->item_id=$cart->product_id;
                $ordered_items->item_quantity=$cart->quantity;
                $ordered_items->price=$cart->product_price;
                $ordered_items->save();
            }
             $data = array('name'=>Auth::user()->id);   
            $orders['maildata']=orders::where('orders.customer_id',Auth::user()->id)
            ->where('orders.id',$orderid)->
            join('address','orders.billing_address','=','address.id')->
            select('address.name as adrname',
            'address.mobile_no as adrmobileno',
            'address.address_line1 as address','orders.*',
            'address.post_code as pincode')->first()->toArray();                
            $orders['items']=order_items::where('order_id',$orderid)->join('products','order_items.item_id','=','products.id')
            ->select('products.name as pname','products.discount_price as discount','order_items.*')->get()->toArray();       
            $orders['status']=orders_status::pluck('status_name','id');    
                Mail::send("templates.mailtemplate",json_decode(json_encode($orders),true),function($message) 
                {
                     $message->to(Auth::user()->email, 'Order Placed')->subject
                        ('Order Placed');                 
                });         
            $user_role=user_role::pluck('id','role');
            // dd($user_role['customer']);
            $userforemail=User::whereIn('role',[$user_role['admin'],$user_role['subadmin']])->get();
            // dd($userforemail);
            // function sendemail($orders){
            foreach($userforemail as $sendemail)
                    {

                         Mail::send("templates.mailtemplate",json_decode(json_encode($orders),true),function($message) use($sendemail) 
                        {
                             $message->to($sendemail->email, 'Order Placed')->subject
                                ('Order Placed');                 
                        }   );
                    }
            
            // sendemail($orders);
            cart::where('customer_id',Auth::user()->id)->delete();
        else:
            return back();
        endif;
        return redirect('orders')->with('success','Ordered Successfully');
    }


    public function search(Request $r){
        // dd((int)$r->category);
        if(empty($r->category)){
            $searchproducts=Products::where('name','like','%'.$r->searchquery.'%')->get();
        }
        else{
            $searchproducts=Products::where('category',$r->category)->where('name','like','%'.$r->searchquery.'%')->get();
        }
        // dd($searchproducts);
        return view('Front.layout.search',['products'=>$searchproducts]);
    }
    public function applycoupon(Request $r){
        // firstorder 
        // dd($r->all());
        $r->validate(['coupon_code'=>'required'])       ;
        $coupon=null;
        $orders=$singleorder=orders::where('customer_id',Auth::user()->id);

        $couponcontroller=new CouponController;
        // 
        $firstorder=$singleorder->first();
        $totalorders=$orders->count();

        // dd($totalorders);
        // 
        $total_order_amount=$orders->select('total')->sum('total');
         // 
            if($firstorder==null){
                $coupon=$couponcontroller->isFirst($r->coupon_code);
            }      
            elseif(coupon::where('coupon_code',$r->coupon_code)->select('coupon_type')->first()->coupon_type=='Total Orders'){
                    // dd('test');                
                $coupon_order_count=coupon::where('coupon_code',$r->coupon_code)->select('coupon_condition')->first()->coupon_condition;
                    // $coupon=false;
                if($totalorders>=$coupon_order_count){
                    $coupon=$couponcontroller->isFirst($r->coupon_code);
                }
            }
            elseif(coupon::where('coupon_code',$r->coupon_code)->select('coupon_type')->first()->coupon_type=='Total Order Amount'){
                // dd("TESt");
                $coupon_total_amount=coupon::where('coupon_code',$r->coupon_code)->select('coupon_condition')->first()->coupon_condition;
                if($total_order_amount>=$coupon_total_amount){
                    $coupon=$couponcontroller->isFirst($r->coupon_code);   
                }

            }
            else{
                $coupon=$couponcontroller->isFirst($r->coupon_code);
            }
            // dd($coupon);
            return $coupon;
    }


    public function cartqty(int $cal,int $cartid){
        if($cal==1){            
            $cart=cart::where('customer_id',Auth::user()->id)->where('id',$cartid)->first();
            $cart->quantity+=1;
            $cart->update();            
        }else{
            $cart=cart::where('customer_id',Auth::user()->id)->where('id',$cartid)->first();
            if($cart->quantity<=1){
                Session::flash('err', $cartid);
            }else{
                $cart->quantity-=1;
            }
            $cart->update();
        }
        return redirect('cart');
    }
}
