<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\wishlists;
use Auth;

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
        $wishlist->customer_id=Auth::user()->id;
        $wishlist->product_id=$id;
        $wishlist->save();
        return response(['id'=>$id]);
    }
    public function wishdelete(string $id){
        wishlists::where('id',$id)->delete();
        return response(['id'=>$id]);
    }
}
