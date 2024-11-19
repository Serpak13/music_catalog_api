<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SongResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return [
            'Название' => $this->title ?? 'Неизвестно',
            'Порядковый номер в альбоме' => $this->pivot->track_number ?? 'Неизвестно',
            'Исполнители' => ArtistResource::collection($this->whenLoaded('artist')),
        ];
    }
}
