<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\categories;
use Illuminate\Http\Request;


class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category=categories::get();
        return view('admin.category.list',['category'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        $r->validate([
            'CategoryName'=>'required|string',
            'discription'=>'required',
            'status'=>'required',
        ]);
        // dd($r);
        $category=new categories;
        $category->name=$r->CategoryName;
        $category->description=$r->discription;
        $category->status=$r->status;
        $cat='';
        if($r->category==0)$cat=NULL;
        else $cat=$r->category;
        $category->parent_id=$cat;
        $category->save();
        return back();
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
        categories ::find($id)->delete();
        return back();
    }
}
