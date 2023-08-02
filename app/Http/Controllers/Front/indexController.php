<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\Products;
use Illuminate\Http\Request;

class indexController extends Controller
{

    public function index()
    {
        $category=categories::get();
        $newItems=Products::get()->sortByDesc('id')->take(5);//get();
        $trendproducts=Products::get()->take(10)->shuffle();
        // dd($trendproducts);
        return view('index',['category'=>$category,'newItems'=>$newItems,'products'=>$trendproducts]);
    }

    public function show(string $slug){
        $product=Products::where('urlslug',$slug)->get()->first();
        // dd($product->name);
        return view('Front.product.showproduct',['product'=>$product]);
    }

}
