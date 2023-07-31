<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;

class addressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $r)
    {
        // dd($r->all());
        $address=Address::where('customer_id',$r->id)->get();
        // dd(count($address));
        return view('admin.address.indexAddress',['addresses'=>$address,'id'=>$r->id]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $r)
    {
        // dd($r->id);
        return view('admin.address.createAddress',['id'=>$r->id]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        $r->validate([
            'name'=>'required',
            'mobile'=>'required',
            'address1'=>'required',
        ]);
        // dd($r->id);
        $address=new Address;//::where('customer_id',$id);
        $address->name=$r->name;
        $address->customer_id=$r->id;
        $address->mobile_no=$r->mobile;
        $address-> address_line1 =$r->address1;
        $address->address_line2=$r->address2;
        $address-> country_code =$r->ccode;
        $address-> post_code=$r->post_code;
        $address->state_code=$r->scode;
        $address->city_code=$r->citycode;
        $address->save();
        return redirect('/address');
    }

    /**
     * Display the aspecified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $address=Address::where('customer_id',$id)->get();
        // dd($address);
        return view('admin.address.editAddress',['address'=>$address,'id'=>$id]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, string $id)
    {
        $address=Address::find($id);
        $address->name=$r->name;
        $address->customer_id=$r->id;
        $address->mobile_no=$r->mobile;
        $address-> address_line1 =$r->address1;
        $address->address_line2=$r->address2;
        $address-> country_code =$r->ccode;
        $address-> post_code=$r->post_code;
        $address->state_code=$r->scode;
        $address->city_code=$r->citycode;
        $address->update();
          // dd($r->all());
          $address=Address::where('customer_id',$r->id)->get();

        return view('admin.address.indexAddress',['id'=>$r->id,'addresses'=>$address]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       Address::find($id)->delete();
        return redirect()->back();
    }
}
