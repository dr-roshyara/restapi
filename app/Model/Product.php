<?php

namespace App\Model;
use App\Model\Review;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    // A Product has many Reviews : i.e. 
    public function reviews(){
        return $this->hasMany(Review::class);
    }
}
