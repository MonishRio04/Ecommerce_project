<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class profilecontroller extends Controller
{
     public function viewprofile(){
        $data['profile']=User::where('id',Auth::user()->id)->first();
        return view('Front.profile.profile',$data);
     }
     public function updateprofile(Request $r){
            // dd($r->image);
            $r->validate([
                'name'=>'required',
                'email'=>'required|email',//|unique:users,email
                'password'=>'required',
            ]);

                 $user=User::where('id',Auth::user()->id)->first();
            // dd(count(User::where('email',$email)->get())>0);
                $user->name=$r->name;
                $user->email=$r->email;
                $user->password=Hash::make($r->password);
                if($r->image!=null){
                $imgname=time().'.'.$r->image->extension();
                $r->file('image')->storeAs('public/customerImages',$imgname);
                $user->image=$imgname;
                }
                // dd($user);
                $user->update();
            return redirect('/view-profile');
     }
}
