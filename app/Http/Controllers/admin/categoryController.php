<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ->orderBy('id','DESC')
        $category=categories::with('parent_name')->get();

        // $paren_category=categories::whereNull('parent_id')->pluck('name','id')->toArray();
        return view('admin.category.list',['category'=>$category]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $data['paren_category']=[''=>'Please select']+categories::whereNull('parent_id')->pluck('name','id')->toArray();
        // dd($data);
        return view('admin.category.category',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        // dd($r);
        $r->validate([
            'CategoryName'=>'required|string',
            'status'=>'required',
            'file'=>'required|image|mimes:png,jpg'
        ]);
        // dd($r->  file->extension().time());
        $category=new categories;
        $category->name=$r->CategoryName;
        $imageName=time().".".$r->file->extension();
        // $r->file('file')->   store('public');
        // dd($imageName);
        $r->file('file')->storeAs('public/images',$imageName);
        $category->image=$imageName;
        $category->description=$r->discription;
        $category->status=$r->status;
        if($r->category==0)$cat=NULL;
        else $cat=$r->category;
        $category->parent_id=$cat;
        $category->save();
        return redirect('/category');
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
       $paren_category=[''=>'Please select']+categories::whereNull('parent_id')->pluck('name','id')->toArray();
        $category=categories::find($id);
        // $data['id']=$id;
        // dd($category);
        return view('admin.category.editCategory',
        ['paren_category'=>$paren_category,
        'category'=>$category,
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, string $id)
    {
        // dd($id);
        $category=categories::find($id);
        $category->name=$r->CategoryName;
        $category->description=$r->discription;
        $category->status=$r->status;
        if($r->category==0)$cat=NULL;
        else $cat=$r->category;
        $category->parent_id=$cat;
        $category->update();
        return redirect('/category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        categories ::find($id)->delete();
        return redirect()->back()->with('dlt','Deleted successfully');
    }
}
