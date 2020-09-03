<?php

namespace App\Model;
use App\User;
use App\Model\Product;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
   // A Review belongs to a particular Product. i.e. 
   public function product(){
    return   $this->belongsTo(Product::class);
   }
   // A review belongs to a particular user . 
    public function user(){
       return $this->belongsTo(User::class);
   }
}
