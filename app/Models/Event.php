<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title', 'date','time', 'description', 'location', 'category',];
 // Add 'type' to fillable fields
}
