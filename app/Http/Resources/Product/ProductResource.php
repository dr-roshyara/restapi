<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'name'=>$this->name,
            'summary'=>$this->summary,
            'description'=>$this->description,
            'price'=>$this->price1,
            'reviews'=>$this->rating(),
            'href'=>[
                'reviews'=>route('reviews.index',$this->id),
            ]
        ];
    }
}
