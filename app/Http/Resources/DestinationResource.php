<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DestinationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'address' => $this->address,
            'area' => $this->area,
            'state' => $this->state,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'visit' => $this->visit,
            'rating' => $this->rating,
            'phone' => $this->phone,
            'image' => $this->image,
            'description_excerpt' => $this->description_excerpt,
            'show_image' => $this->show_image,
            'email' => $this->email,
            'ratings_count' => $this->ratings_count,
        ];
    }
}
