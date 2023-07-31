<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\user_role;
use App\Models\userRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=User::get();
        $user_role=user_role::get()->pluck('role','id');
        return view('admin.customer.customerIndex',['user'=>$user,'user_role'=>$user_role]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user_role=user_role::get()->pluck('role','id');
        // dd($user_role);
       return view('admin.customer.customerCreate',['userrole'=>$user_role]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        $r->validate([
            'name'=>'required',
            'email'=>'required|unique:users,email|email',
            'password'=>'required',
        ]);
        $user= new User;
        $user->name=$r->name;
        $user->email=$r->email;
        $user->password=Hash::make($r->password);
        $user->role=$r->role;
        $imgname=time().'.'.$r->file->extension();
        $r->file('file')->storeAs('public/customerImages',$imgname);
        $user->image=$imgname;
        $user->save();
        return redirect('/customer');
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
       $user=User::find($id);
        $user_role=user_role::get()->pluck('role','id');
       return view('admin.customer.customerEdit',['user'=>$user,'userrole'=>$user_role]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'password'=>'required',
                'name'=>'required',
                'email'=>'required|email',
                'file'=>'required|mimes:png,jpg'
            ]
            );
       $user=User::find($id);
       $user->name=$request->name;
       $user->email=$request->email;
       $user->password=$request->password;
       $user->role=$request->role;
       $imgname=time().'.'.$request->file->extension();
       $request->file('file')->storeAs('public/customerImages',$imgname);
       $user->image=$imgname;
       $user->update();
       return redirect('/customer');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return back();

    }
}
