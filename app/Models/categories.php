<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;
    public $timestamps=false;
    public function parent_name(){
        return $this->hasOne(self::class,'id','parent_id');
    }

    protected $fillable=['parent_id'];
}
