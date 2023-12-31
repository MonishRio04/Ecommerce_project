<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\userControl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class authController extends Controller
{
public function index()
{
   return view('authentication.login');
}


public function customLogin(Request $request)
{
    $request->validate([
        'email' => 'required',
        'password' => 'required',
    ]);
    $credentials = [
        'email' => $request['email'],
        'password' => $request['password'],
        // 'role'=>1,2
    ];
    $user=User::where('email',$request->email)->first();
        if((int)$user->role==1||(int)$user->role==2){        
            if (Auth::attempt($credentials)) {
                return redirect('/admin');
    }
}
    return redirect("login");
}   


public function registration()
{
    return view('authentication.register');
}


public function customRegistration(Request $request)
{
    // dd($request);
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'min:6|required_with:confirmPassword|same:confirmPassword',
        'confirmPassword' => 'min:6'
    ]);

    // $data = $request->all();
    $user=new User;
    $user->name=$request->name;
    $user->email=$request->email;
    $user->password=Hash::make($request->password);
    $user->save();
    return redirect('/');
}

// public function dashboard()
// {
//  return view('app');
// }

}
