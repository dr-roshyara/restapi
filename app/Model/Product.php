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
    
    public function rating()
    {
        return   $this->reviews->count() ? round($this->reviews->sum('star') / $this->reviews->count(), 1) : 'NO Rating Yet';
    }
    public function totalprice() 
    {
        return  $this->price1 > 0 ? round(((1 - 1 * $this->discount / 100) * $this->price1), 2) : 0;
    }
}
