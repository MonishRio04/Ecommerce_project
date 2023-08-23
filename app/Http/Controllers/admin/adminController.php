<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\categories;
use Illuminate\Http\Request;
use App\Models\orders;
use Carbon\Carbon;
use App\Models\User;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {             
        $data['totalorders']=count(orders::get());
        $data['totalcustomers']=count(User::get());
        $ordercount=orders::whereMonth('created_at',Carbon::now()->month)->select('created_at')->get()->toArray();        
        $data['days']=date('t');       
        // dd(date('d',strtotime($ordercount[0]['created_at'])));
        $chartdata=[];
        for( $i=0; $i<=$data['days']; $i++){
          $chartdata[$i]=0;
          foreach($ordercount as $count){
            $day=date('d',strtotime($count['created_at']));
           if($i==$day){ 
                $chartdata[$i]+=1;                           
                }
             }  
        }         
        $data['chart']=$chartdata;
        return view('admin.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        // dd($r);

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
