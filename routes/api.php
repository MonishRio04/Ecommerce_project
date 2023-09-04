<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/test',function(){
    return response()->json(['test'=>'testing']);
});
Route::get('/test2/{id}',function($id){

    return response()->json(['user'=>User::where('id',$id)->get()]);
});
Route::post('/test3',function(Request $r){

    return response()->json($r);
});
