<?php

namespace App\Http\Controllers;

use App\Http\Resources\AlbumResource;
use App\Models\Album;

/**
 * @OA\Get (
 *     path="/api/catalog",
 *     summary="Отображение каталога",
 *     tags={"Catalog"},
 *       @OA\Response(
 *          response=200,
 *          description="Music album details",
 *          @OA\JsonContent(
 *              type="object",
 *              @OA\Property(
 *                  property="Исполнитель",
 *                  type="object",
 *                  @OA\Property(property="Имя", type="string", example="Cedrick Hand I")
 *              ),
 *              @OA\Property(property="Альбом", type="string", example="Totam omnis qui."),
 *              @OA\Property(property="Год выпуска", type="integer", example=1984),
 *              @OA\Property(
 *                  property="Песни",
 *                  type="array",
 *                  @OA\Items(
 *                      type="object",
 *                      @OA\Property(property="Название", type="string", example="Possimus dicta quisquam repudiandae."),
 *                      @OA\Property(property="Порядковый номер в альбоме", type="integer", example=2)
 *                  )
 *              )
 *          )
 *      )
 *  )
 */

class CatalogController extends Controller
{
    public function index(){

        $albums = Album::with(['artist', 'songs'=>function($query){
            $query->with('artists')->orderBy('album_song.track_number');
        }])->get();

        return AlbumResource::collection($albums);

    }
}
