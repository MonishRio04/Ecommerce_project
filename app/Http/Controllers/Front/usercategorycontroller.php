<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\categories;
use App\Models\Products;
use Illuminate\Http\Request;

class usercategorycontroller extends Controller
{
    public function category(string $category){

        $cateId=categories::where('name',$category)->get()->toArray()[0]['id'];
        $data['products']=Products::where('category',$cateId)->get();
        // dd($data);
        return view('Front.showproduct.showcategory',$data);

    }
    public function allcategories(){
        $categories=categories::latest()->get();
        return view('Front.category.category',['category'=>$categories]);
    }
}
