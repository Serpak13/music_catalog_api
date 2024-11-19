<?php

namespace App\Http\Resources;

use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AlbumResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return  [
            'Исполнитель' => new ArtistResource($this->whenLoaded('artist')),
            'Альбом' => $this->title ?? 'Неизвестно',
            'Год выпуска' => $this->release_year ?? 'Неизвестно',
            'Песни' => SongResource::collection($this->whenLoaded('songs')),
        ];
    }
}
