<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventImages extends Model
{
    use HasFactory;

    protected $fillable = ['event_id', 'image_path'];

    // Define relationship with Event model
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
