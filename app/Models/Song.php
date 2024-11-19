<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Song extends Model
{
    use HasFactory;
    protected $table = 'songs';
    protected $fillable = ['title'];

    public function albums(){
        return $this->belongsToMany(Album::class, 'album_song')->withPivot('track_number');
    }

    public function artists(){
        return $this->belongsToMany(Artist::class, 'artist_song');
    }
}
