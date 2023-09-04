<?php

namespace App\Imports;

use App\Models\Products;
use Maatwebsite\Excel\Concerns\ToModel;
// use WithStartRow\WithStartRow;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel,WithHeadingRow{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    
    
    public function model(array $row)
    {
        Validator::make($row, [
             '*.name' => 'required|unique:products,name',
             '*.price' => 'required|numeric',
             '*.discount_price' => 'numeric',
             '*.category'=>'numeric',
             'urlslug'=>'required',
         ])->validate();
       
        // dd($row);
        return new Products([
            'name'     => $row['name'],
            'price'    => $row[ 'price'], 
            'discount_price' =>$row['discount_price'],
            'category' =>$row['category'],
            'image' =>$row['image'],
            'description' =>$row['description'],
            'stock_quantity'=>$row['stock_quantity'],
            'urlslug'=>$row['urlslug'],
        ]);
    }
}
