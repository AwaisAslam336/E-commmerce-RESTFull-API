<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductCollection extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=> $this->name,
            'totalPrice'=> round((1-($this->discount/100)) * $this->price,2),
            'rating'=>round($this->reviews->avg('star'),2),
            'href'=>[
                'link' => route('products.show',$this->id)
            ]
        ];
    }
}
