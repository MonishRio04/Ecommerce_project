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

    public function index()
    {
        $category=categories::get();
        $newItems=Products::get()->sortByDesc('id')->take(5);//get();
        $trendproducts=Products::get()->take(10)->shuffle();
        if(Auth::check()){
        $cart = cart::where('customer_id', Auth::user()->id)->join('products', 'cart.product_id', '=', 'products.id')
        ->select('products.name as product_name', 'products.price as product_price','cart.*')->get();
        }else{$cart=[];}
        $quantity=cart::where('customer_id',Auth::user()->id)->pluck('quantity','product_id');
        // dd($quantity);
        return view('index',['category'=>$category,'newItems'=>$newItems,'quantity'=>$quantity,
        'products'=>$trendproducts,'cartitems'=>$cart] );
    }

    public function show(string $slug){
        $product=Products::where('urlslug',$slug)->get()->first();
        if(Auth::check()){
        $cart = cart::where('customer_id', Auth::user()->id)->join('products', 'cart.product_id', '=', 'products.id')
        ->select('products.name as product_name', 'products.price as product_price','cart.*')->get();
        }else{$cart=[];}
        $carts=response()->json($cart);
        return view('Front.product.showproduct',['product'=>$product,'cartitems'=>$cart,'jsonarray'=>$cart]);
    }
    public function addToCart(Request $r){
        $carts=new cart;
        $sameproduct=cart::where('product_id',$r->product_id)->first();
        if($sameproduct!=null){
            if($sameproduct->customer_id==$r->customer_id&&$sameproduct->product_id==$r->product_id){
                $quantity=(int)$sameproduct->quantity;
                $quantity+=(int)$r->quantity;
                $sameproduct->quantity=(int)$quantity;
                $sameproduct->update();
            }
        }
        else{
            $carts->customer_id=(int)$r->customer_id;
            $carts->product_id=(int)$r->product_id;
            $carts->quantity=(int)$r->quantity;
            $carts->save();
        }
        $cart = Cart::where('customer_id', Auth::user()->id)->join('products', 'cart.product_id', '=', 'products.id')
        ->select('products.name as product_name', 'products.price as product_price','cart.*')->get();
        return response($cart);//->with('added','Added to cart');
    }

    public function delete(int $id){
        // dd($id);
        cart::find($id)->delete();
        return redirect()->back();
    }
    // }
    // public function ajaxupdate(){
    //     $cart = Cart::where('customer_id', Auth::user()->id)->join('products', 'cart.product_id', '=', 'products.id')
    //     ->select('products.name as product_name', 'products.price as product_price','cart.*')->get();
    //     //else{$cart=[];}
    //     // $carts=response()->json($cart);
    //     return response()->json($cart);
    // }
}
