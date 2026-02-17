<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\TechnologyResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // visszaadja a projekt adatait, beleértve a kapcsolódó technológiákat is, ha azok betöltve vannak
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'content' => $this->content,
            'image_url' => $this->image_url,
            'github_url' => $this->github_url,
            'featured' => $this->featured,
            'technologies' => TechnologyResource::collection($this->whenLoaded('technologies'))
        ];
    }
}
