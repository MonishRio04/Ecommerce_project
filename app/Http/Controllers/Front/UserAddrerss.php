<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\city;
use App\Models\country;
use App\Models\state;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAddrerss extends Controller{

    public function useraddress(){
        $address['address']=Address::where('customer_id',Auth::user()->id)->get();
        $address['country']=country::pluck('name','id');
        return view('Front.usersddress.addaddress',$address);
    }
    public function createaddress(Request $r){
        // dd($r->id!=null);
        $r->validate([
            'name' => 'required',
            'mobile' => 'required',
            'address1' => 'required',
        ]);

        if($r->id!=null){
            $address = Address::where('id',$r->id)->first();
            $address->name = $r->name;
            $address->customer_id = Auth::user()->id;
            $address->mobile_no = $r->mobile;
            $address->address_line1 = $r->address1;
            $address->address_line2 = $r->address2;
            $address->post_code = $r->pincode;
            $address->address_type=$r->adrtype;
            $address->state_code=$r->state;
            $address->city_code=$r->city;
            $address->country_code=$r->Country;
            $address->update();

        }else{
            $address = new Address;//::where('customer_id',$id);
            $address->name = $r->name;
            $address->customer_id = Auth::user()->id;
            $address->mobile_no = $r->mobile;
            $address->address_line1 = $r->address1;
            $address->address_line2 = $r->address2;
            $address->post_code = $r->pincode;
            $address->address_type=$r->adrtype;
            $address->state_code=$r->state;
            $address->city_code=$r->city;
            $address->country_code=$r->Country;
            $address->latitude=$r->latitude;
            $address->longitude=$r->longitude;
            $address->save();
        }
        return redirect('/customer-address');
    }
    public function getState(Request $r){
        // dd($r->all());
        $states=state::where('country_id',$r->country)->pluck('name','id');
        return response()->json($states);
    }
    public function getCity(Request $r){
        // dd($r->all());
        $cities=city::where('state_id',$r->stateid)->pluck('name','id');
        return response()->json($cities);
    }
    public function edit(string $id){

        $data['address']=Address::where('id',$id)->first();
        return response($data);

    }


    public function destroy(string $id)
    {
       Address::find($id)->delete();
        return redirect()->back();
    }
}
