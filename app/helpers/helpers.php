<?php
use App\Models\categories;


if(!function_exists('category')){
    function category(){
        $data['categorylist']=["All Categories"]+categories::get()->pluck('name','id')->toArray();
        return $data;
    }
}
