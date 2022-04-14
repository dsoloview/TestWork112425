<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShopResource extends JsonResource
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
            'city' => $this->city,
            'address' => $this->address,
            'phone' => $this->phone,
            'site' => $this->site,
            'available' => $this->whenPivotLoaded('product_shop', function () {
                return $this->pivot->available;
            }),
            'products' => ($request->has('available')) ? ProductResource::collection($this->whenLoaded('available')) : ProductResource::collection($this->whenLoaded('products')),
        ];
    }
}
