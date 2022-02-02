<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            'name'=> $this->name,
            'description'=>$this->detail,
            'price'=>$this->price,
            'stock'=>$this->stock == 0 ? 'Out of Stock!':$this->stock,
            'discount'=>$this->discount,
            'totalPrice'=> round((1-($this->discount/100)) * $this->price,2),
            'rating'=>round($this->reviews->avg('star'),2) == 0 ?
                 'No Rating Yet':round($this->reviews->avg('star'),2),
            'href'=>[
                'reviews' => route('reviews.index',$this->id)
            ]
        ];
    }
}
