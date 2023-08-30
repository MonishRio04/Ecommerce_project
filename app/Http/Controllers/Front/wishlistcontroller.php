<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\wishlists;
use Auth;
use App\Models\cart;
class wishlistcontroller extends Controller
{
    public function viewlist(){
        $data['items']=wishlists::where('customer_id',Auth::user()->id)->join(
            'products','products.id','=','wishlists.product_id')->select(
                'products.name as pname','products.price as product_price',
                'products.image as pimage','products.urlslug as slug','wishlists.*')->get();
            // dd($data['items']->all());
        return view('Front.wishlist.wishlist',$data);
    }
    public function addlist(string $id){
        $wishlist=new wishlists;
        $status=null;
        if(wishlists::where('customer_id',Auth::user()->id)->where('product_id',$id)->count()>0){
            wishlists::where('customer_id',Auth::user()->id)->where('product_id',$id)->delete();
            $status="deleted";
        }else{
            $wishlist->customer_id=Auth::user()->id;
            $wishlist->product_id=$id;
            $wishlist->save();
            $status='added';
        }
        return response(['id'=>$id,'status'=>$status]);
    }
    public function wishdelete(string $id){
        wishlists::where('id',$id)->delete();
        return response(['id'=>$id]);
    }
    public function addToCart(){
        $wishlist=wishlists::where('customer_id',Auth::user()->id)->get();
        foreach($wishlist as $wish){
            $cart=new cart;
            if(cart::where('customer_id',Auth::user()->id)->where('product_id',$wish->product_id)->count()!=0){
                $exist=cart::where('customer_id',Auth::user()->id)->where('product_id',$wish->product_id)->first();
                $exist->quantity+=1;
                $exist->update();
            }else{
                $cart->customer_id=$wish->customer_id;
                $cart->product_id=$wish->product_id;
                $cart->quantity=1;
                $cart->save();
            }
        }
        return redirect('cart');
    }
}
