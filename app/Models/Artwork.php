<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    use HasFactory;

    protected $fillable =  ['name', 'price', 'desc', 'size', 'category', 'artist_id'];

    public function artist()
    {
        return $this->belongsTo(Artist::class, 'artist_id');
    }
    public function image()
    {
        return $this->hasMany(ArtImage::class, 'artwork_id');
    }
}
