<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductCollection extends JsonResource
{
    /**
     * Transform the resource  into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'name'=>$this->name,
            'Total price'=> $this->totalprice(),
            'rathing'=>$this->rating(),
            'href'=>[
                'link'=>route('products.show',$this->id)
            ],

        ];
    }
}
