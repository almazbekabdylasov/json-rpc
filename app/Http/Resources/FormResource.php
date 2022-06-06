<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FormResource extends JsonResource
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
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'inputs' => InputResource::collection($this->resource->inputs),
            'selects' => SelectResource::collection($this->resource->selects),
            'textarea' => TextareaResource::collection($this->resource->textarea),
        ];
    }
}
