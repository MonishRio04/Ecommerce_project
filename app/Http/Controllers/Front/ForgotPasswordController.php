<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\password;
use DB; 
use Str;
use Carbon\Carbon;
use Mail;
use Hash;
class ForgotPasswordController extends Controller
{
    public function showForgetPasswordForm(){
        return view('Front.UserAuthentication.forgetPassword');
    }

    public function submitForgetPasswordForm(Request $request){
      $request->validate([
          'email' => 'required|email|exists:users',
      ]);
      $token = Str::random(64);
      DB::table('password_resets')->insert([
          'email' => $request->email, 
          'token' => $token, 
          'created_at' => Carbon::now()
      ]);
      Mail::send('templates.forgetPassword', ['token' => $token], function($message) use($request){
          $message->to($request->email);
          $message->subject('Reset Password');
      });
      return back()->with('message', 'your reset password link is send to you successfully!');
  }

    public function showResetPasswordForm($token) { 
     return view('Front.UserAuthentication.resetPassword', ['token' => $token]);
  }
        public function submitResetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:users',
              'password' => 'required|string|min:6|confirmed',
              'password_confirmation' => 'required'
          ]);
          $updatePassword = DB::table('password_resets')->where(['email' => $request->email,'token' => $request->token])->first();
          if(!$updatePassword){
              return back()->withInput()->with('error', 'Invalid token!');
          }
          $user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
          DB::table('password_resets')->where(['email'=> $request->email])->delete();
          return redirect('/userlogin')->with('message', 'Your password has been changed!');

      }
}
