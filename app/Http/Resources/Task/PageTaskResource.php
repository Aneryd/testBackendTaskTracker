<?php

namespace App\Http\Resources\Task;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Status\IndexStatusResource;

class PageTaskResource extends JsonResource
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
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "end_date" => $this->end_date,
            "status" => $this->whenLoaded("status", new IndexStatusResource($this->status)),
        ];
    }
}
