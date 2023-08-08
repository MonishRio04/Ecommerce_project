<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class indexController extends Controller
{

    public function data(){
        $data=[];
            $data['category']=categories::get();
            $data['newItems']=Products::get()->sortByDesc('id')->take(5);//get();
            $data['products']=Products::get()->take(10)->shuffle();
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
        // dd($data['product']);
        return view('Front.product.showproduct',$this->data(),$data);
    }
    public function addToCart(Request $r){
        $carts=new cart;
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

        return view('Front.product.cartItems',$this->data());

   }
}