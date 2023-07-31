<?php

namespace App\Http\Controllers\admin;

use App\Models\categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product=Products::get();
        // Category::where('id', $id)->pluck('name')->first();
        // $category=categories::where('parent_id')->get();
        $category=categories::pluck('name','id')->toArray();
        // dd($category[1]);
        return view('admin.product.index',['product'=>$product,'category'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['paren_category']=categories::pluck('name','id')->toArray();
       return view('admin.product.createProduct',$data);
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
            'category'=>'required',
            'file'=>'required|mimes:png,jpg',
            'discription'=>'required',
        ]);
        $products=new Products();
        $imgname=time().".".$r->file->extension();
        $r->file('file')->storeAs('public/productImages',$imgname);
        $products->image=$imgname;
        $products->name=$r->productName;
        $products->description=$r->discription;
        $products->price=$r->price;
        $products->category=$r->category;
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
        $product=Products::find($id);
        // $paren_category=[''=>'Please select']+categories::whereNull('parent_id')->pluck('name','id')->toArray();
        $parent_category=categories::pluck('name','id')->toArray();
        // dd($parent_category);
        return view('admin.product.editProduct',['product'=>$product,'parent_category'=>$parent_category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, string $id)
    {
        $products=Products::find($id);
        $oldimg=$products->image;
            if($r->file!=null){
                 Storage::delete('public/productImages/' . $oldimg);
                 $imgname=time().'.'.$r->file->extension();
                 $r->file('file')->storeAs('public/productImages/',$imgname);
                 $products->image=$imgname;
            }

        $products->name=$r->productName;
        $products->description=$r->discription;
        $products->price=$r->price;
        $products->category=$r->category;
        $products->update();
        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Products ::find($id)->delete();
        return redirect()->back()->with('dlt','Deleted successfully');
    }
}
