<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HeroResource extends JsonResource
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
            'stats' => [
                'offensive' => $this->offensive,
                'defensive' => $this->defensive,
                'utility' => $this->utility,
            ],
            'image' => $this->image,
            'skills' => $this->skills,
        ];
    }

}