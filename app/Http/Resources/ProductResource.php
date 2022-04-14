<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'color' => $this->color,
            'available' => $this->whenPivotLoaded('product_shop', function () {
                return $this->pivot->available;
            }),
            'shops' => ($request->has('available')) ? ShopResource::collection($this->whenLoaded('available')) : ShopResource::collection($this->whenLoaded('shops')),

        ];
    }
}
