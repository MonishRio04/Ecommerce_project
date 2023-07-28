<?php

namespace App\Http\Controllers\admin;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product=Products::get();
        return view('admin.product.index',['product'=>$product]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $data['paren_category']=[''=>'Please select']+categories::whereNull('parent_id')->pluck('name','id')->toArray();
       return view('admin.product.createProduct');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        // dd($r);
        $r->validate([
            'productName'=>'required|string',
            'price'=>'required',
            'varient'=>'required',
            'discription'=>'required',
        ]);
        // dd($r->  file->extension().time());
        $products=new Products();
        $products->name=$r->productName;
        $products->description=$r->discription;
        $products->price=$r->price;
        $products->variant=$r->varient;
        $products->save();
        return redirect('/product');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
