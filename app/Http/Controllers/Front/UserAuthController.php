<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\categories;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserAuthController extends Controller
{
    public function index()
    {
    // $cartitems=cart::where('customer_id',Auth::user()->id)->get();
    return view('Front.UserAuthentication.login');
    }
    public function loginvalidate(Request $r){

        $r->validate([
        'email' => 'required',
        'password' => 'required',
         ]);

        $credentials = [
            'email' => $r['email'],
            'password' => $r['password'],
            'role'=>3
        ];
        // $category=category();
        // dd($category);
        if (Auth::attempt($credentials)) {
            return redirect('/');

        }
        else{
            return redirect("userlogin");
        }
    }
    public function register(){
        return view('Front.UserAuthentication.Register');
    }

    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('userlogin');
    }
    public function registervalidate(Request $r){
        // dd($r->all());
        $r->validate([
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'password'=>'min:6|required_with:confirmPassword|same:confirmPassword',
            'confirmPassword' => 'min:6',
        ]);
        $user=new User;
        $user->name=$r->name;
        $user->email=$r->email;
        $user->password=Hash::make($r->password);
        $user->save();
        return redirect('/');
    }
 }

